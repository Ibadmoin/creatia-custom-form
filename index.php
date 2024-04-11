<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="post" >
        <p class="info-head">Basic <span>Information</span> </p>
       <div class="info-wrapper">
       <div class="info-feild">
            <p class="if-head">Name <span>*</span></p>
            <input type="text">
        </div>
        <div class="info-feild">
            <p class="if-head">Email <span>*</span></p>
            <input type="text">
        </div>
        <div class="info-feild">
            <p class="if-head">Address <span>*</span></p>
            <input type="text">
        </div>
        <div class="info-feild">
            <p class="if-head">Phone <span>*</span></p>
            <input type="text">
        </div>
        <div class="info-feild">
            <p class="if-head">Type of Design <span>*</span></p>
            <input type="text">
        </div>
        <div class="info-feild">
            <p class="if-head">File Upload <span>*</span></p>
            <div class="filewrapper">
            <input type="file" id="file-upload" name="file-upload">
            <label for="file-upload" class="custom-file-upload">Choose File</label>
            <p>Max file Size: 2gb</p>
            </div>
        </div>
       </div>

    </form>
    
</body>
</html>