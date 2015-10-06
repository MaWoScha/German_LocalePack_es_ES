<?php
/**
 * @category  German
 * @package   German_LocalePack
 * @authors   MaWoScha <mawoscha@siempro.co, http://www.siempro.co/>
 * @developer MaWoScha <mawoscha@siempro.co, http://www.siempro.co/>  
 * @version   0.4.0.
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
$installer = $this;

$installer->startSetup();

$blockContent = <<<EOD
Si tiene alguna duda respecto a su pedido, no deje de ponerse en contacto con nosotros
en email <a href=\"mailto:{{var store_email}}\">{{var store_email}}</a>,
en teléfono <a href=\"tel:{{var store_phone}}\">{{var store_phone}}</a>,
a través de <a title=\"Mi Servicio en Skype\" href=\"skype:mi.tienda?chat\" target=\"_blank\">Skype-Chat</a> (Nombre de usuario: mi.tienda)
o en Facebook en nuestra <a title=\"Mi página de fans en Facebook\" href=\"http://www.facebook.com/mi.tienda\" target=\"_blank\">Mi página de fans</a>.
EOD;

$storeId = 2;

$staticBlocks = array(
    array(
        'title'         => 'eMail Template Say Hello (es)',
        'identifier'    => 'email_template_say_hello',
        'content'       => 'Estimado/a',
        'is_active'     => 0,
        'stores'        => array($storeId)
    ),
    array(
        'title'         => 'eMail Template Contact (es)',
        'identifier'    => 'email_template_contact',
        'content'       => $blockContent,
        'is_active'     => 0,
        'stores'        => array($storeId)
    ),
    array(
        'title'         => 'eMail Template Say Bye (es)',
        'identifier'    => 'email_template_say_bye',
        'content'       => '¡Gracias por su confianza!',
        'is_active'     => 0,
        'stores'        => array($storeId)
    )
);

/**
 * Insert default blocks
 */
foreach ($staticBlocks as $data) {
    try {
        Mage::getModel('cms/block')->setData($data)->save();
    } catch (Exception $e) {
        # To prevent exception "A block identifier with the same properties already exists
        # in the selected store." in "app:code:core:Mage:Cms:Model:Resource:Block.php"
#        throw new Exception("Oops, mi error in ES German LocalePack");
    }
}

$installer->endSetup();

?>
