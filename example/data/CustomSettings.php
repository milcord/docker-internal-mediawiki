<?php

/***** SemanticMediaWiki and related */
require_once "$IP/extensions/ParamProcessor/src/ParamProcessor.php";
require_once "$IP/extensions/Validator/Validator.php";
require_once "$IP/extensions/SemanticMediaWiki/SemanticMediaWiki.php";
require_once "$IP/extensions/SemanticForms/SemanticForms.php";
require_once "$IP/extensions/SemanticResultFormats/SemanticResultFormats.php";


/***** VisualEditor */
require_once "$IP/extensions/VisualEditor/VisualEditor.php";
$wgDefaultUserOptions['visualeditor-enable'] = 1; // Enable by default for everybody
$wgHiddenPrefs[] = 'visualeditor-enable'; // Don't allow users to disable it
$wgVisualEditorParsoidURL = "http://{$_ENV['PARSOID_PORT_8000_TCP_ADDR']}:{$_ENV['PARSOID_PORT_8000_TCP_PORT']}";


/***** Slack */
// @see https://github.com/grundleborg/mediawiki-slack
/*
require_once "$IP/extensions/Slack/Slack.php";
$wgSlackWebhookURL = "https://hooks.slack.com/services/....replace.me";
$wgSlackUserName = "wiki";
$wgSlackChannel = "#general";
*/


/***** LDAP */
// @see https://www.mediawiki.org/wiki/Extension:LDAP_Authentication
/*
require_once "$IP/extensions/LdapAuthentication/LdapAuthentication.php";
require_once "$IP/includes/AuthPlugin.php";

$wgAuth = new LdapAuthenticationPlugin();
$wgLDAPDomainNames = array(
  'openldap_example_com',
);
$wgLDAPServerNames = array(
  'openldap_example_com' => 'ldap.example.com',
);
$wgLDAPUseLocal = false;
$wgLDAPEncryptionType = array(
  'openldap_example_com' => 'tls',
);
$wgLDAPPort = array(
  'openldap_example_com' => 389,
);
$wgLDAPProxyAgent = array(
  'openldap_example_com' => 'cn=readonly,dc=example,dc=com',
);
$wgLDAPProxyAgentPassword = array(
  'openldap_example_com' => '*****',
);
$wgLDAPSearchAttributes = array(
  'openldap_example_com' => 'uid'
);
$wgLDAPBaseDNs = array(
  'openldap_example_com' => 'dc=example,dc=com',
);
# To pull e-mail address from LDAP
$wgLDAPPreferences = array(
  'openldap_example_com' => array( 'email' => 'mail')
);
# Group based restriction
$wgLDAPGroupUseFullDN = array( "openldap_example_com"=>false );
$wgLDAPGroupObjectclass = array( "openldap_example_com"=>"posixgroup" );
$wgLDAPGroupAttribute = array( "openldap_example_com"=>"memberuid" );
$wgLDAPGroupSearchNestedGroups = array( "openldap_example_com"=>false );
$wgLDAPGroupNameAttribute = array( "openldap_example_com"=>"cn" );
$wgLDAPRequiredGroups = array( "openldap_example_com"=>array("cn=ldapwiki,ou=groups,dc=example,dc=com"));
$wgLDAPLowerCaseUsername = array(
  'openldap_example_com' => true,
);
*/
