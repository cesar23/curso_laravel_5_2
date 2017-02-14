<?php

namespace App\Librerias;

class EscapeHtmlClass {

    public function EscapeHtmlClass() {
        
    }

    
    
       //metodo escapa los caracteres html -perfecto para traer datos 
       //convertidos en addslashes y poder editarlos en un textbox
    
       /*
        *  ejemplo:<div class="fb-comments" data-href="<?php echo $this->base_url() ?>/detallenoticia.html?cod_area=02&noti=1" data-numposts="5" data-colorscheme="light"></div>
        * A:
        *  &lt;div class=&quot;fb-comments&quot; data-href=&quot;&lt;?php echo $this-&gt;base_url() ?&gt;/detallenoticia.html?cod_area=02&amp;noti=1&quot; data-numposts=&quot;5&quot; data-colorscheme=&quot;light&quot;&gt;&lt;/div&gt;

        */
    
    public function EscapeHtmlImput($html) {
        $html = htmlentities($html, ENT_QUOTES, "UTF-8");
        $html = stripcslashes(nl2br($html));
        return $html;
        //return "cesar";
    }

}
