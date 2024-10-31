# Release Notes

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

<style>
*{background:#456 !important;color:#cde !important}
a{color:#efefef !important;border-bottom:dotted 1px #dedede;text-decoration:none !important}
a:hover{border-bottom-style:solid}
i,em,i a,em a{color:#6ab !important}
i a,em a{border-bottom:dotted 1px #6ab}
code,pre{background:#466 !important;padding:3px !important}
</style>