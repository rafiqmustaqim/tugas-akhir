<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Autocomplete</title>
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/jquery-ui.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <h2>Autocomplete Codeigniter</h2>
        </div>
        <div class="row">
            <form>
               <div class="form-group">
                <label>Title</label>
                <input type="text" name="nama_mahasiswa" class="form-control" id="nama" placeholder="Title" style="width:500px;">
            </div>
            <div class="form-group">
                <label>Description</label>
                <input type="text" name="nim" class="form-control" placeholder="Description" style="width:500px;">
            </div>
        </form>
    </div>
</div>

<script src="<?php echo base_url() ?>/assets/js/jquery-3.3.1.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>/assets/js/bootstrap.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>/assets/js/jquery-ui.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function(){

        $('#nama').autocomplete({
            source: "<?php echo site_url('blog/get_autocomplete');?>",

            select: function (event, ui) {
                $('[name="nama_mahasiswa"]').val(ui.item.nama_mahasiswa); 
                $('[name="nim"]').val(ui.item.nim); 
            }
        });

    });
</script>

</body>
</html>