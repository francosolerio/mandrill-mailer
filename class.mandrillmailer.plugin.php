<?php if(!defined('APPLICATION')) exit();
/*  Copyright 2013 Zachary Doll
 *  This program is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation, either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
$PluginInfo['MandrillMailer'] = array(
    'Name' => 'Mandrill Mailer',
    'Description' => 'Sends email via Mandrill API.',
    'Version' => '1.0',
    'RequiredApplications' => array('Vanilla' => '2.0.18.8'),
    'RequiredTheme' => FALSE,
    'RequiredPlugins' => FALSE,
    'MobileFriendly' => TRUE,
    'HasLocale' => FALSE,
    'RegisterPermissions' => FALSE,
    // 'SettingsUrl' => '/plugin/bulkedit/settings',
    // 'SettingsPermission' => 'Garden.Settings.Manage',
    'Author' => "Franco Solerio",
    'AuthorEmail' => 'franco@solerio.net',
    'AuthorUrl' => 'http://digitalia.fm',
    'License' => 'GPLv3'
);

class MandrillMailerPlugin extends Gdn_Plugin {

  public function Gdn_Email_SendMail_Handler(&$Sender) {
       LogMessage(basename(__FILE__),__LINE__,__CLASS__,__METHOD__,"Set Encoding to 8 bit");
       
       // ob_start();
       // var_dump(debug_backtrace());
       // $a=ob_get_contents();
       // ob_end_clean();
       // LogMessage(basename(__FILE__),__LINE__,__CLASS__,__METHOD__,$a);

       $Sender->PhpMailer->Encoding = '8bit';
   }
   
  public function Gdn_Dispatcher_BeforeDispatch_Handler($Sender) {
      require_once 'plugins/MandrillMailer/class.email.php';
  }

  // QUESTI QUI SOTTO SONO INUTILIZZATI
  //
  // Tentativi con _create (dovrebbe fare override ma non funge)
  public function UserModel_SendEmailConfirmationEmail_Create($Sender, $User) {
      LogMessage(basename(__FILE__),__LINE__,__CLASS__,__METHOD__,"OVERRIDE!");
  }

  public function Gdn_Email_Send_Create($Sender) {
      LogMessage(basename(__FILE__),__LINE__,__CLASS__,__METHOD__,"QUESTOSIPORCOGGIUDA!");
  }

   // Tentativo FireEvent?
   public function Gdn_Email_BeforeSend_Handler($Sender) {
       LogMessage(basename(__FILE__),__LINE__,__CLASS__,__METHOD__,"BEFORE SEND HANDLER");
   }

  // public function Base_Render_Before(&$Sender) {
  //          // This method gets called before the Render method gets called on the DiscussionsController object.
  //   LogMessage(basename(__FILE__),__LINE__,__CLASS__,__METHOD__,"");
  // }


}

?>

