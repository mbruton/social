<?php

namespace adapt\social{
    
    /* Prevent Direct Access */
    defined('ADAPT_STARTED') or die;
    
    class bundle_social extends \adapt\bundle{
        
        public function __construct($data){
            parent::__construct('social', $data);
        }
        
        public function boot(){
            if (parent::boot()){
                
                /* Register a new handler for tables with social interations */
                $this->add_handler("\\adapt\\social\\social");
                
                /* Update the user model and add social functions */
                \adapt\users\model_user::extend(
                
                );
                
                return true;
            }
            
            return false;
        }
        
    }
    
    
}

?>