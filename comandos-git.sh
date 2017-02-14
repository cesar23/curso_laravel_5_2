
#…or create a new repository on the command line
fuente mejor:
https://git-scm.com/book/es/v1/Empezando-Configurando-Git-por-primera-vez
#----------------------------configurando para este proyecto
# $ git config --global user.name "cesar ide.c9.io"
# $ git config --global user.email cesar@ide.c9.io
git config  user.name "Cesar Auris"
git config  user.email solito_203@hotmail.com
ssh-keygen 
ssh-keygen -t rsa -b 4096 -C "solito_203@hotmail.com"
#---------------------------------------------------------

echo "# corporacionpacifico_com_pe" >> README.md
git init
git add README.md
git commit -m "first commit"
git remote add origin git@github.com:cesar23/curso_laravel_5_2.git
git push -u origin master

#…or push an existing repository from the command line

git remote add origin git@github.com:cesar23/curso_laravel_5_2.git
#git push -u origin master
git pull -u origin master #--------IMPORTANTE
git pull -u origin master && git commit -am "05:47 p.m. 31/01/2017" && git push origin master


#---------- para cuando ya estea  todo bajado solo se remite a comitear loas cambios
git pull
git add .
git commit -m "first commit2"
git push origin master
#---comandos git para  la  actualizacion
# git config --global user.name "cesar auris"
# git config --global user.email solito_203@hotmail.com
git pull origin master && git commit -am "05:47 p.m. 31/01/2017" && git push origin master
--
#PARA  COMPRIMIR
zip -r demo.zip config css js Librerias css template-01 modelo *.php

#----log de apache
tail -f /var/log/apache2/error.log