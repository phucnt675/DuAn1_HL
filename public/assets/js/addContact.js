var apiUrl = 'http://localhost:3000/';
var contact = 'contact';

 const getData =  () => {
    let dataFrom = document.getElementById('frm').elements;
    let obj = {
        name: dataFrom['name'].value,
        email: dataFrom['email'].value,
        mess: dataFrom['mess'].value
    }

    return obj;
}

const validate = () => {
    const data = getData();


    if (!data.mess) {
        document.getElementById('inval-mess').style.display = 'block';
        document.getElementById('mess').classList.add('border-danger');
    } else {
        document.getElementById('inval-mess').style.display = 'none';
        document.getElementById('mess').classList.remove('border-danger');
    }

    // Kiểm tra nếu tất cả các trường đều có giá trị
    return data.mess;
};

function add() {
    if (validate()) { // Nếu dữ liệu hợp lệ
        axios.post(`${apiUrl}${contact}`, getData())
            .then(res => {
                if (res.status === 200 || res.status === 201) {
                    location.href = './index.html'; // Chuyển hướng sau khi thêm thành công
                }
            })
            .catch(err => console.error(err));
    }
}