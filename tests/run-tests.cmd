@ECHO OFF
pushd "%~dp0\.."

copy .\tests\php-win.ini .\tests\php.ini
rem add empty line in case of newline wasn't at the end
echo.  >> .\tests\php.ini 
php -r "echo 'extension_dir=' . ini_get('extension_dir');" >> .\tests\php.ini

call .\vendor\bin\tester .\tests\%1 -p php -c .\tests

popd
