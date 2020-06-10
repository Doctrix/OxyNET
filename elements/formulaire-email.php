<!-- formulaire mailto -->
<div class="form-group">
    <form class="formfull" action="mailto:contact@mifaconcept.fr" Method="POST" name="mon_form" onSubmit="return validation(this.form)">
        <div class="form-group" face="Tahoma" size="2" color="#000080">
            <table cellspacing="1" summary="">
                <input class="form-control" type="text" name="ch1" size="40" maxlength="256" placeholder="Nom">
                <input class="form-control" type="text" name="ch2" size="40" maxlength="256" placeholder="Ville">
                <input class="form-control" type="text" name="ch3" size="40" maxlength="256" placeholder="Code postal">
                <input class="form-control" type="text" name="ch4" size="40" maxlength="256" placeholder="Age">
                <input class="btn btn-dark" type="submit" value="Envoyer">
            </table>
        </div>
    </form>
</div>