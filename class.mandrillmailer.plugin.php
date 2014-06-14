<?php if(!defined('APPLICATION')) exit();
/*  Copyright 2014 Franco Solerio
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
    'RequiredApplications' => array('Vanilla' => '2.1'),
    'RequiredTheme' => FALSE,
    'RequiredPlugins' => FALSE,
    'MobileFriendly' => TRUE,
    'HasLocale' => FALSE,
    'RegisterPermissions' => FALSE,
    'SettingsUrl' => '/settings/mandrillmailer',
    'SettingsPermission' => 'Garden.Settings.Manage',
    'Author' => "Franco Solerio",
    'AuthorEmail' => 'franco@solerio.net',
    'AuthorUrl' => 'http://digitalia.fm',
    'License' => 'GPLv3'
);

class MandrillMailerPlugin extends Gdn_Plugin {

  public function Gdn_Dispatcher_BeforeDispatch_Handler($Sender) {
      require_once 'plugins/MandrillMailer/class.email.php';
  }

   public function SettingsController_MandrillMailer_Create($Sender, $Args = array()) {
      $Sender->Permission('Garden.Settings.Manage');
      $Sender->SetData('Title', T('Mandrill Mailer Settings'));

      $Cf = new ConfigurationModule($Sender);
      $Cf->Initialize(array(
          'Plugins.Mandrill.ApiKey' => array('Description' => 'Enter your Mandrill API key'),
          ));

      $Sender->AddSideMenu('dashboard/settings/plugins');
      $Cf->RenderAll();
   }
}

?>

