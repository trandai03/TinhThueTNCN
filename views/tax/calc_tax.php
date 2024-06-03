<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tính Thuế Thu Nhập</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .result {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Tính Thuế Thu Nhập</h1>
        <form id="taxForm" method="post" action="<?php echo $base_url."/index.php/tax/calcTax"?>">
            <div class="form-group">
                <label for="thuNhap">Thu nhập hàng tháng (VND):</label>
                <input type="number" class="form-control" id="thuNhap" name="thu_nhap" require>
            </div>
            <div class="form-group">
                <label for="soNguoi">Số người phụ thuộc:</label>
                <input type="number" class="form-control" id="soNguoi" name="so_nguoi" require>
            </div>
            <button type="submit" class="btn btn-primary">Tính Thuế</button>
        </form>
        <div class="result">
            <h3>Kết quả:</h3>
            <p id="taxResult"></p>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Custom JS -->
    <script src="tax.js"></script>
</body>
</html>
