<?php
/**
 **-----------------------------------------------------------------------------------------**
 ** Créez une class final Application qui a les propriétés suivantes : **
    ** lancementApplication (string) **
**-----------------------------------------------------------------------------------------**
*todo Final est de la protection *
*todo Une class final ne peut pas être héritée *
*todo Une méthode final ne peut pas subir de modification *
**-----------------------------------------------------------------------------------------**
**/
final class Application
{
    public function lancementApplication()
    {
        return "L'application est lancée.";
    }
}

$appli = new Application();
echo $appli->lancementApplication();

/**
 **-----------------------------------------------------------------------------------------**
 ** Créez une class Extension qui a les propriétés suivantes : **
    ** lancementExtension **
**-----------------------------------------------------------------------------------------**
**/
class Extension
{
    /**final**/ public function lancementExtension()
    {
        return "L'extension est lancée.";
    }
}

$extension =new Extension();

/**
 **-----------------------------------------------------------------------------------------**
 ** Créez une class Extension2 qui a les propriétés suivantes : **
    ** lancementExtension **
**-----------------------------------------------------------------------------------------**
**/
class Extension2 extends Extension
{
    public function lancementExtension()
    {
        return "L'extension différent.";
    }
}

$extension2 =new Extension2();
echo $extension2->lancementExtension();
?>