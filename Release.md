# Release Notes

## 1.3.4 *2025/12/12* [fix_remote_ip]
- added 'Request::setTrustedProxies' method to access remote IP via proxy

## 1.3.3 *2025/12/11* [littlefixes2025]
- insert config `INSERT INTO config (id,type,name,value,description,created_at,updated_at) VALUES (NULL,'html','contact_blurb','content','Blurb for the Contact Page',NULL,NULL);`
- add contact_blurb config to Contact page
- insert config `INSERT INTO config (id,type,name,value,description,created_at,updated_at) VALUES (NULL,'html','register_blurb','content','Blurb for the Register Page',NULL,NULL);`
- add register_blurb config to Register page
- added user agent and IP to email template
- minor css fixes

## 1.3.2 *2025/08/06* [fix_custom_styles]
- fixed those pesky custom styles again  

## 1.3.1 *2025/08/06* [align_with_prod]
- corrected video htaccess file  
- added versions to inf.db  
- updated .gitignore  

## 1.3.0 *2025/08/06* [fixstuffagain]
- Added some custom css  
- .gitignore updates  
- added Laravel version to readme.md  

## 1.2.9 *2024/11/07* [ch_ch_ch_ch_changes]
- Fixed so .gif uploads as .gif 
- Slugs are _ and not - based
- No Image redirects to random image @ https://omi.nz/bin/rnd/
- Backend post edit , no image points to /images/ui/ni.gif

## 1.2.8 *2024/11/01* [trumbowyg]
- Added Trumbowyg to replace the most expensive TinyMCE
- Removed TinyMCE ... Huzzah!
- Tidied up md files

## 1.2.7 *2024/10/31* [dev]
- single.blade: added post ID
- single.blade: added 'edit' link
- some readme changes
- inf.db more generic
- added Account page (WIP)
- start_service.php , auto starts app when accessing the site
- stop_servcie.php - run this to stop the service (if started by the above process)

## 1.2.6 *2024/10/22* [fix_body_strip]
- fixed Font.php compatibility bug
- corrected font for code,pre
- 'code' and 'pre' allowed via Purifier

## 1.2.5 *2024/10/22* - direct hot fix! ... it never ends!!
- fixed require for symfony/css-selector ... to ^5.4

## 1.2.4 *2024/10/22* - direct hot fix!
- removed phpunit/phpunit
- added back cache dir : /bootstrap/cache/.gitignore

## 1.2.3 *2024/10/22* - direct hot fix!
- "phpunit/phpunit": "~5.7" to version "*"

## 1.2.2 *2024/10/22* [fix_tinymce]
- Using TinyMCE with API key - will need to find a fully free version!
- Fixed incompatibility bug in 'ezyang\htmlpurifier' and now pointing towards custom 'sirjeff\htmlpurifier'

## 1.2.1 *2024/10/18* [setupinstall]
- cleaning up code, removing unrequired images and git-ignoring them
- fixes for bugs due to compatibility running on new soft/hardware

## 1.2.0 *2024/08/16* [updatefromonline]
- updated files to use the same as the online version

## 1.1.0 *2024/08/15* [gitinstall]

- fixed php version
- sql compatibility fix
- tidy up
- removed `/vendor/`
- install instruction corrected ... clone project and compose!
- start tagging
- start merging branches in
- touched `release.md`

## 1.0.0 *2019/07/04*

in the beginning there was order ... not 

