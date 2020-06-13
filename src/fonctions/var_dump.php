<?php if ($_SESSION['auth'] && ['admin']):?>
    <h3><b>DEBUG</b>
    <h3>SERVER | CONSTANTE | SESSION</h3>
    <hr>
    <div class="formfull">
        <h2>SERVER</h2>
        <?php var_dump($_SERVER); ?>
    </div>
    <hr/> 
    <div class="formfull">    
        <h2>CONSTANTE</h2>
        <?php var_dump(get_defined_constants()); ?>
    </div>
    <hr/>
    <div class="formfull">    
        <h2>SESSION</h2>
        <?php var_dump($_SESSION);  ?>
    </div>
    <?php endif; ?>