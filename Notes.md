

Sign-in with admin details:

user: admin@madeup.domain.co.nz
password: password



VHost setup

 ```
 
 <VirtualHost *:80>
  ServerName larablog
  DocumentRoot "/home/larablog/public"
  <Directory "/home/larablog/public">
   AllowOverride All
  </Directory>
  LogLevel warn
  ErrorLog "/home/larablog/log/err.log"
  CustomLog "/home/larablog/log/acs.log" combined
 </VirtualHost>

 ```
 
 
 
 Video notes
    
    
For mpeg 4 video - H.264, the suffix .mp4 works 
For mpeg 4 audio - AAC, the suffix .aac works

H.264/AAC
    

The following compression standards are supported: (Safari)

H.264 Baseline Profile Level 3.0 video, up to 640 x 480 at 30 fps. Note that B frames are not supported in the Baseline profile.
MPEG-4 Part 2 video (Simple Profile)
AAC-LC audio, up to 48 kHz
Movie files with the extensions .mov, .mp4, .m4v, and .3gp are supported.

    