<?php
class Message
{
    private $user_obj;
    private $con;

    public function __construct($con, $user)
    {
        $this->con = $con;
        $this->user_obj = new User($con, $user);
    }

    public function sendMessage($user_to, $body, $date)
    {
        if ($body != "") 
        {

            $userLoggedIn = $this->user_obj->getUsername();
            $senderID = $this->user_obj->getUserId();
            $receiverID = $this->user_obj->getUserIdFromUserName($user_to);

            $msgQuery = mysqli_query($this->con, "INSERT INTO message VALUES('', '$date', '$body') ");
            
            $msgId = mysqli_insert_id($this->con);

            $msgInfoQuery = mysqli_query($this->con, "INSERT INTO messageInfo VALUES('$msgId', '$senderID', '$receiverID')");
        
        }
    }
    
    public function getMessages($otherUser)
    {
        $userLoggedIn = $this->user_obj->getUserID();
        $otherUserID = $this->user_obj->getUserIdFromUserName($otherUser);
        $data = "";
        
        $get_messages_query = mysqli_query($this->con, "SELECT m.messageId, m.messageBody, m.date, info.senderID, info.receiverID FROM message m JOIN messageinfo info ON m.messageId=info.messageId AND ( (info.senderId='$userLoggedIn' AND info.receiverId='$otherUserID') OR (info.receiverId='$userLoggedIn' AND info.senderId='$otherUserID')) ORDER BY info.messageId ASC");

        while($row = mysqli_fetch_assoc($get_messages_query)) {
            $user_to = $row['receiverID'];
            $user_from = $row['senderID'];
            $body = $row['messageBody'];
            $div_top = ($user_to == $userLoggedIn) ? "<div class='message green'>" : "<div class='message blue'>";
            $data = $data . $div_top . $body . "</div><br><br>";
        } //end of while

        return $data;
    }

    public function getConvos()
    {
        $userLoggedIn = $this->user_obj->getUserID();
        $return_string = "";

        $convos = array();

        $query = mysqli_query($this->con, "SELECT senderId, receiverId FROM messageInfo WHERE senderId='$userLoggedIn' OR receiverId='$userLoggedIn' ORDER BY messageId DESC ");

        while ($row = mysqli_fetch_array($query)) {
            //Because one user is known, other is to be known, which has the convo with us
            $user_to_push = ($row['senderId'] != $userLoggedIn) ? $row['senderId'] : $row['receiverId'];

            if (!in_array($user_to_push, $convos)) {
                array_push($convos, $user_to_push);
            }
        } // end of while

        foreach ($convos as $userid) {
            
            $username = mysqli_query($this->con, "SELECT username FROM regUser WHERE id='$userid'");       
            $username = mysqli_fetch_array($username);
            $username = $username['username'];

            $user_found_obj = new User($this->con, $username);
            $latest_message_details = $this->getLatestMessage($userLoggedIn, $userid); 

            //  C U R  R E N T A U D I T . C H E C K F U N C T I O N T O C O N T I N U E 

            
            //Length of body > 12
            $dots = (strlen($latest_message_details[1]) >= 15 ) ? " ..." : "";
            //Chop of at 12th character
            $split =  str_split($latest_message_details[1], 12);

            $split = $split[0] . $dots;

            $return_string .= "<a href='messages.php?user=". $user_found_obj->getUsername() ."'> <div class='user_found_messages'>
                <img src='" . $user_found_obj->getProfilePic() . " 'style='border-radius:5px; margin-right:10px;margin-top:5px;'><span class='profileName'> " . $user_found_obj->getFirstAndLastName() . "</span>
                <span class='timestamp_smaller' id='grey'> " . $latest_message_details[2] . " </span>
                <p id='grey' style='margin:0; font-size:15px;'>" . $split . "</p>
                </div>
                </a>
                ";

        }

        return $return_string;

    }  

    public function getLatestMessage($userLoggedIn, $user2)
    {
        $details_array = array();

        $query = mysqli_query($this->con, "SELECT m.messageBody, mi.receiverId, m.date FROM message m JOIN messageInfo mi ON m.messageId=mi.messageId WHERE (senderId='$userLoggedIn' AND receiverId='$user2') OR (senderId='$user2' AND receiverId='$userLoggedIn') ORDER BY m.messageId DESC LIMIT 1 ");

        $row = mysqli_fetch_array($query);

        $sent_by = ($row['receiverId'] == $userLoggedIn) ? "They said: " : "You said: ";

        //Timeframe
        $date_time_now = date("Y-m-d H:i:s");
        $start_date = new DateTime($row['date']); //Time of post
        $end_date = new DateTime($date_time_now); //Current time
        $interval = $start_date->diff($end_date); //Difference between dates
        if ($interval->y >= 1) {
            if ($interval == 1) {
                $time_message = $interval->y . " year ago";
            }
            //1 year ago
            else {
                $time_message = $interval->y . " years ago";
            }
            //1+ year ago
        } else if ($interval->m >= 1) {
            if ($interval->d == 0) {
                $days = " ago";
            } else if ($interval->d == 1) {
                $days = $interval->d . " day ago";
            } else {
                $days = $interval->d . " days ago";
            }

            if ($interval->m == 1) {
                $time_message = $interval->m . " month " . $days;
            } else {
                $time_message = $interval->m . " months " . $days;
            }

        } else if ($interval->d >= 1) {
            if ($interval->d == 1) {
                $time_message = "Yesterday";
            } else {
                $time_message = $interval->d . " days ago";
            }
        } else if ($interval->h >= 1) {
            if ($interval->h == 1) {
                $time_message = $interval->h . " hour ago";
            } else {
                $time_message = $interval->h . " hours ago";
            }
        } else if ($interval->i >= 1) {
            if ($interval->i == 1) {
                $time_message = $interval->i . " minute ago";
            } else {
                $time_message = $interval->i . " minutes ago";
            }
        } else {
            if ($interval->s < 30) {
                $time_message = "Just now";
            } else {
                $time_message = $interval->s . " seconds ago";
            }
        }
        //End of timeframe

        array_push($details_array, $sent_by);
        array_push($details_array, $row['messageBody']);
        array_push($details_array, $time_message);

        return $details_array;

    }

    public function getMostRecentUser()
    {
        $userLoggedIn = $this->user_obj->getUserID();

        //Limit to one result in message.
        $query = mysqli_query($this->con, "SELECT receiverId, senderId FROM messageInfo WHERE receiverId='$userLoggedIn' OR senderId='$userLoggedIn' ORDER BY messageId DESC LIMIT 1");

        if (mysqli_num_rows($query) == 0) {
            return false;
        }

        $row = mysqli_fetch_array($query);
        $user_to = $row['receiverId'];
        $user_from = $row['senderId'];

        if ($user_to != $userLoggedIn) {
            return $user_to;
        }
        //If you're not user_to which means you sent message so recent user
        else {
            return $user_from;
        }

    }

}

?>