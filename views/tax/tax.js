document.getElementById('taxForm').addEventListener('submit', function (e) {
    e.preventDefault();

    // Lấy giá trị từ form
    const thuNhap = parseInt(document.getElementById('thuNhap').value);
    const soNguoi = parseInt(document.getElementById('soNguoi').value);

    // Gọi hàm tính thuế và hiển thị kết quả
    const thue = tinhThue(thuNhap, soNguoi);
    document.getElementById('taxResult').innerText = `Thuế phải nộp: ${thue} VND`;
});

function tinhThue(thuNhap, soNguoi) {
    const giam_ca_nhan = 11000000;
    const giam_nguoi_phu_thuoc = 4400000;

    let thu_nhap_thue = thuNhap - giam_ca_nhan - soNguoi * giam_nguoi_phu_thuoc;

    if (thu_nhap_thue <= 0) {
        return 0;
    } else {
        let result;
        if (thu_nhap_thue <= 5 * 1000000) {
            result = thu_nhap_thue * 5 / 100;
        } else if (thu_nhap_thue <= 10 * 1000000) {
            result = thu_nhap_thue * 10 / 100 - 0.25 * 1000000;
        } else if (thu_nhap_thue <= 18 * 1e6) {
            result = thu_nhap_thue * 15 / 100 - 0.75 * 1000000;
        } else if (thu_nhap_thue <= 32 * 1e6) {
            result = thu_nhap_thue * 20 / 100 - 1.65 * 1000000;
        } else if (thu_nhap_thue <= 52 * 1e6) {
            result = thu_nhap_thue * 25 / 100 - 3.25 * 1000000;
        } else if (thu_nhap_thue <= 80 * 1e6) {
            result = thu_nhap_thue * 30 / 100 - 5.85 * 1000000;
        } else {
            result = thu_nhap_thue * 35 / 100 - 9.85 * 1000000;
        }
        return result;
    }
}
