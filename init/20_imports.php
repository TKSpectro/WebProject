<?php

// core
require_once 'init/10_database.php';
require_once 'core/function.php'; 

//require_once 'core/model.php';

// models

require_once 'core/controller.php';
require_once 'models/_baseModel.class.php';
require_once 'models/account.class.php';
require_once 'models/cat.class.php';
require_once 'models/shoppingCart.class.php';
require_once 'models/address.class.php';
require_once 'models/product.class.php';
require_once 'models/prodCat.class.php';
require_once 'models/contact.class.php';
require_once 'models/order.class.php';
require_once 'models/orderItem.class.php';




// controller
require_once 'controller/addressController.php';
require_once 'controller/accountController.php';
require_once 'controller/registerController.php';
require_once 'controller/shoppingcartController.php';
require_once 'controller/contactController.php';
require_once 'controller/loginController.php';
require_once 'controller/paypalController.php';
require_once 'controller/productController.php';
require_once 'controller/checkoutSucceedController.php';
#require_once 'views/printAddress.php';


