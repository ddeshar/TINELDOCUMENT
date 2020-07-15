<script>
    function changeLang(){
        document.getElementById('form_lang').submit();
    }
</script>

<!-- Language -->
<div class="navbar-nav topbar-nav ml-md-auto align-items-center">
    <form method='get' action='' id='form_lang' >
        <select class="form-control" name='lang' onchange='changeLang();' >
            <option value='en' <?php if(isset($_SESSION['lang']) && $_SESSION['lang'] == 'en'){ echo "selected"; } ?> >English</option>
            <option value='th' <?php if(isset($_SESSION['lang']) && $_SESSION['lang'] == 'th'){ echo "selected"; } ?> >ไทย</option>
        </select>
    </form>
</div>
