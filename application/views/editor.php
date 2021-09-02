<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>A Simple Page with CKEditor 4</title>
    <!-- Make sure the path to CKEditor is correct. -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">
    <script src="<?= base_url('ckeditor/ckeditor.js') ?>"></script>
</head>

<body>
    <div class="container">
     <form action="">
         <div><hr>
         <label><h3><b>Title</b></h3></label><br>
         <input type="text" name="Article" id="title" size="164">
         </div>
         <hr>
        <textarea name=" editor1" id="editor1" rows="10" cols="80">
            Write here your code.....
        </textarea>
        <script>
        // Replace the <textarea id="editor1"> with a CKEditor 4
        // instance, using default configuration.
        CKEDITOR.replace('editor1');
        </script>
        <input type="submit" class="publish_btn" name="submit_data" value="Publish">
     </form>
    </div>
</body>
<style>
.publish_btn
{
width: 100%;
padding: 10px;
background-color: rgb(30, 69, 79);
color: white;
cursor: pointer;
font-size: 20px;
}

</style>
</html>