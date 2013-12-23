Installation instructions are as follows:

1. Edit the config.php file to include the relevent information.
2. Upload the entire personalLoad directory, feel free to change the name if you like, just include this in the config.php
3. Setup your mysql database, username and password have this information to hand. (ask your webhost if you are unsure about this)
4. Goto the web address to which you just uploaded script and go into the /install/ directory.
5. Follow the instrctions found on screen, this only really consists of entering the information you generated earlier.
6. Delete the installation directory following no errors from your webserver.
7. Test out the script without editing the index.php
8. Once you have verified everything is working and updating attempt to make the script with with another loadingurl.

Instructions for how to replicate the PersonalLoad loadingurl are as follows:

1. Make sure the loadingurl you are using is a php file, this should be quite obvious.
2. Include the following text at the top of the file: <?PHP include("personal.php"); ?>
3. Save your index.php over the one found in the personalLoad folder
4. Make sure all resources that came with your other loadingurl script are moved into the personalLoad folder.
5. be careful to note that if you are asked to overwrite anything other than index.php you are likely overwriting part of my script and it might not work as intended.

MANUAL SQL DATABASE SETUP:

If the installation script fails you can manually set this up, edit the dbconfig.php with the correct information and upload the database structure as found in the /install/ directory.

Contact:

Handy_man : http://coderhire.com/users/view/2104

Please leave feedback after you have asked me about the script/ any problems you have been having.

Thank you,

- Handy_man