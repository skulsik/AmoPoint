<div class="container p-3">
    <h2>Загрузите файл</h2>
    <div class="card-body p-3">
        <form action="index.php?module=FileUpload&method=upload" method="post" enctype="multipart/form-data" class="form-control">
            <input type="file" name="fileToUpload" required class="btn btn-outline-primary">
            <button type="submit" name="submit" class="btn btn-success">Загрузить</button>
        </form>
    </div>
</div>