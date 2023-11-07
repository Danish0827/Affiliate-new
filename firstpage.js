function generateRandomAlphaNumeric(length) {
    const characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    let randomString = '';

    for (let i = 0; i < length; i++) {
        randomString += characters[Math.floor(Math.random() * characters.length)];
    }

    return randomString;
}

// Example usage:
const length = 6; // Change this to the desired length
const randomString = generateRandomAlphaNumeric(length);

const urlParams = new URLSearchParams(window.location.search);
const adveId = urlParams.get('advr_id');
const orderId = urlParams.get('order_id');
const pusrId = urlParams.get('pusr_id');
const url = `https://armafperfume.com/?advr_id=${adveId}&order_id=${orderId}&pusr_id=${pusrId}`;

if (adveId && !document.cookie.includes('armafadvrcookie')) {
    document.cookie = `armafadvrcookie=${adveId}; expires=${new Date(Date.now() + 3600 * 1000).toUTCString()}; path=/`;
}

if (orderId && !document.cookie.includes('armafordercookie')) {
    document.cookie = `armafordercookie=${orderId}; expires=${new Date(Date.now() + 3600 * 1000).toUTCString()}; path=/`;
}

if (pusrId && !document.cookie.includes('armafpusrcookie')) {
    document.cookie = `armafpusrcookie=${pusrId}; expires=${new Date(Date.now() + 3600 * 1000).toUTCString()}; path=/`;
}

if (!document.cookie.includes('armafrandomcookie')) {
    const randomValue = randomString; // Assuming you have defined randomString somewhere
    document.cookie = `armafrandomcookie=${randomValue}; expires=${new Date(Date.now() + 3600 * 1000).toUTCString()}`;

    // Redirect using JavaScript
    const redirectUrl = `https://websitetest.info/admin/api?advr_id=${adveId}&order_id=${orderId}&pusr_id=${pusrId}&order_details=${json_string}&redirect_url=${url}&customeruID=${randomValue}&type=add`;
    window.location.href = redirectUrl;
}