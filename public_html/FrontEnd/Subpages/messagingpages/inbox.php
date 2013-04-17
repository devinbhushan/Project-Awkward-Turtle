<?php

/** 
 * View your inbox 
 * @return void 
 */  
function viewInbox()  
{  
   //require_once( FRAMEWORK_PATH . 'models/messages.php' );  
   $messages = new Messages( $this->registry );  
   $cache = $messages->getInbox( $this->registry->getObject('authenticate')->getUser()->getUserID() );  
   $this->registry->getObject('template')->buildFromTemplates('header.tpl.php', 'messages/inbox.tpl.php', 'footer.tpl.php');  
   $this->registry->getObject('template')->getPage()->addTag( 'messages', array( 'SQL', $cache ) );  
}
?>

<div id="main">  
    <div>  
        <ul>  
            <li><a href="messages/create">Create a new message</a></a>  
        </ul>  
    </div>  
    <div>  
    <h1>Your inbox</h1>  
        <table>  
            <tr>  
                <th>From</th>  
                <th>Subject</th>  
                <th>Sent</th>  
            </tr>  
            <!-- START messages -->  
            <tr class="{read_style}">  
                <td>{sender_name}</td>  
                <td><a href="messages/view/{ID}">{subject}</a></td>  
                <td>{sent_friendly}</td>  
            </tr>  
            <!-- END messages -->  
        </table>  
    </div>  
</div>  
<?php
/** 
 * View a message 
 * @param int $message the ID of the message 
 * @return void 
 */  
function viewMessage( $message )  
{  
   //require_once( FRAMEWORK_PATH . 'models/message.php' );  
   $message = new Message( $this->registry, $message );  
   if( $message->getRecipient() == $this->registry->getObject('authenticate')->getUser()->getUserID() )  
   {  
      $this->registry->getObject('template')->buildFromTemplates('header.tpl.php', 'messages/view.tpl.php','footer.tpl.php');  
      $message->toTags( 'inbox_' );  
   }  
   else  
   {  
      $this->registry->errorPage( 'Access denied', 'Sorry, you are not 
         allowed to view that message');  
   }  
}  
?>

<div id="main">  
        <div>  
            <ul>  
                <li><a href="messages/">Your inbox</a></a>  
                <li><a href="messages/create/{inbox_id}">  
                Reply to this message</a></a>  
                <li><a href="messages/delete/{inbox_id}">  
                Delete this message</a></a>  
                <li><a href="messages/create">Create a new message</a></a>  
            </ul>  
        </div>  
    <div>  
    <h1>View message</h1>  
        <table>  
        <tr>  
            <th>Subject</th>  
            <td>{inbox_subject}</td>  
        </tr>  
        <tr>  
            <th>From</th>  
            <td>{inbox_senderName}</td>  
        </tr>  
        <tr>  
            <th>Sent</th>  
            <td>{inbox_sentFriendlyTime}</td>  
        </tr>  
        <tr>  
            <th>Message</th>  
            <td>{inbox_message}</td>  
        </tr>  
        </table>  
    </div>  
</div>  

<?php
/** 
 * Delete a message 
 * @param int $message the message ID 
 * @return void 
 */  
function deleteMessage( $message )  
{  
   //require_once( FRAMEWORK_PATH . 'models/message.php' );  
   $message = new Message( $this->registry, $message );  
   if( $message->getRecipient() == $this->registry->getObject('authenticate')->getUser()->getUserID() )  
   {  
      if( $message->delete() )  
      {  
         $url = $this->registry->getObject('url')->buildURL( array(),  
           'messages', false );  
         $this->registry->redirectUser( $url, 'Message deleted',  
           'The message has been removed from your inbox');  
      }  
      else  
      {  
         $this->registry->errorPage( 'Sorry...', 'An error occured 
           while trying to delete the message');  
      }  
   }  
   else  
   {  
      $this->registry->errorPage( 'Access denied',  
        'Sorry, you are not allowed to delete that message');  
   }  
}  


/** 
 * Compose a new message, and process new message submissions 
 * @parm int $reply message ID this message is in reply to [optional] 
   only used to pre-populate subject and recipient 
 * @return void 
 */  
function newMessage( $reply=0 )  
{  
$this->registry->getObject('template')->buildFromTemplates('header. 
  tpl.php', 'messages/create.tpl.php', 'footer.tpl.php');  


//require_once( FRAMEWORK_PATH . 'models/relationships.php' );  
$relationships = new Relationships( $this->registry );  
if( isset( $_POST ) && count( $_POST ) > 0 )  
{  
// this additional check may not be something we require for private messages?  
   //require_once( FRAMEWORK_PATH . 'models/message.php' );  
   $message = new Message( $this->registry, 0 );  
   $message->setSender( $this->registry->getObject('authenticate')->getUser()->getUserID() );  
   $message->setRecipient( $recipient );  
   $message->setSubject( $this->registry->getObject('db')->sanitizeData( $_POST['subject'] ) );  
   $message->setMessage( $this->registry->getObject('db')->sanitizeData( $_POST['message'] ) );  
   $message->save();  
   // email notification to the recipient perhaps??  
   // confirm, and redirect  
   $url = $this->registry->getObject('url')->buildURL( array(),  
     'messages', false );  
   $this->registry->redirectUser( $url, 'Message sent', 'The 
      message has been sent');  
}  
/*else  
{  $this->registry->errorPage('Invalid recipient','Sorry, you can only send messages to your recipients');  
     
} */ 
else  
{  $cache = $relationships->getByUser( $this->registry->getObject('authenticate')->getUser()->getUserID() );  
$this->registry->getObject('template')->getPage()->addTag( 'recipients', array( 'SQL', $cache ) );  
if( $reply > 0 )  
{  
//require_once( FRAMEWORK_PATH . 'models/message.php' );  
       $message = new Message( $this->registry, $reply );  
       if( $message->getRecipient() == $this->registry->getObject('authenticate')->getUser()->getUserID() )  
       {  
          $this->registry->getObject('template')-> getPage()->addAdditionalParsingData( 'recipients', 'ID',  
            $message->getSender(), 'opt', "selected='selected'");  
          $this->registry->getObject('template')->getPage()->addTag( 'subject', 'Re: ' . $message->getSubject() );  
       }  
       else  
       {  
          $this->registry->getObject('template')->getPage()->addTag( 'subject', '' );  
       }  
     }  
     else  
     {  
        $this->registry->getObject('template')->getPage()->addTag( 'subject', '' );  
     }  
   }  
}
?>

<div id="main">  
    <div>  
        <ul>  
            <li><a href="messages/">Your inbox</a></a>  
        </ul>  
    </div>  
    <div>  
        <h1>Compose message</h1>  
            <form action="messages/create" method="post">  
                <label for="recipient">To:</label><br />  
                <select name="recipient">  
                <!-- START recipients -->  
                <option value="{ID}" {opt}>{users_name}</option>  
                <!-- END recipients -->  
                </select><br />  
                <label for="subject">Subject:</label><br />  
                <input id="subject"  
                value="{subject}" /><br />  
                <label for="message">Message:</label><br />  
                <textarea name="message"></textarea><br />  
                <input id="create" value="Send message" />  
            </form>  
    </div>  
</div>  

