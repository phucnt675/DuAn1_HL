const provinceSelect = document.getElementById('province');
const districtSelect = document.getElementById('district');
const wardSelect = document.getElementById('ward');

// API lấy danh sách tỉnh
async function fetchProvinces() {
    try {
        const response = await fetch('https://vapi.vnappmob.com/api/province/');
        if (!response.ok) throw new Error(`Lỗi! Status: ${response.status}`);
        const data = await response.json();
        return data.results || [];
    } catch (error) {
        console.error('Lỗi khi tải danh sách tỉnh/thành phố:', error);
        return [];
    }
}

// API lấy danh sách quận/huyện
async function fetchDistricts(provinceId) {
    try {
        const response = await fetch(`https://vapi.vnappmob.com/api/province/district/${provinceId}`);
        if (!response.ok) throw new Error(`Lỗi! Status: ${response.status}`);
        const data = await response.json();
        return data.results || [];
    } catch (error) {
        console.error('Lỗi khi tải danh sách quận/huyện:', error);
        return [];
    }
}

// API lấy danh sách phường/xã
async function fetchWards(districtId) {
    try {
        const response = await fetch(`https://vapi.vnappmob.com/api/province/ward/${districtId}`);
        if (!response.ok) throw new Error(`Lỗi! Status: ${response.status}`);
        const data = await response.json();
        return data.results || [];
    } catch (error) {
        console.error('Lỗi khi tải danh sách phường/xã:', error);
        return [];
    }
}

// Cập nhật dropdown
function updateDropdown(selectElement, options) {
    selectElement.innerHTML = '<option value="">-- Đang tải --</option>';
    if (options.length === 0) {
        selectElement.innerHTML = '<option value="">-- Không có dữ liệu --</option>';
    } else {
        options.forEach(item => {
            const option = document.createElement('option');
            option.value = item.id || item.province_id || item.district_id || item.ward_id;
            option.textContent = item.name || item.province_name || item.district_name || item.ward_name;
            selectElement.appendChild(option);
        });
    }
}

// Cập nhật danh sách tỉnh/thành phố
async function updateProvincesDropdown() {
    const provinces = await fetchProvinces();
    updateDropdown(provinceSelect, provinces);
}

// Cập nhật danh sách quận/huyện theo tỉnh
async function updateDistrictsDropdown(provinceId) {
    districtSelect.innerHTML = '<option value="">-- Đang tải Quận/Huyện --</option>';
    wardSelect.innerHTML = '<option value="">-- Chọn Phường/Xã --</option>'; // Reset phường/xã
    const districts = await fetchDistricts(provinceId);
    updateDropdown(districtSelect, districts);
}

// Cập nhật danh sách phường/xã theo quận/huyện
async function updateWardsDropdown(districtId) {
    wardSelect.innerHTML = '<option value="">-- Đang tải Phường/Xã --</option>';
    const wards = await fetchWards(districtId);
    updateDropdown(wardSelect, wards);
}

// Xử lý sự kiện thay đổi Tỉnh/Thành phố
provinceSelect.addEventListener('change', (event) => {
    const provinceId = event.target.value;
    if (provinceId) {
        updateDistrictsDropdown(provinceId);
    } else {
        districtSelect.innerHTML = '<option value="">-- Chọn Quận/Huyện --</option>';
        wardSelect.innerHTML = '<option value="">-- Chọn Phường/Xã --</option>';
    }
});

// Xử lý sự kiện thay đổi Quận/Huyện
districtSelect.addEventListener('change', (event) => {
    const districtId = event.target.value;
    if (districtId) {
        updateWardsDropdown(districtId);
    } else {
        wardSelect.innerHTML = '<option value="">-- Chọn Phường/Xã --</option>';
    }
});

// Khởi tạo danh sách tỉnh/thành phố khi trang load
updateProvincesDropdown();
