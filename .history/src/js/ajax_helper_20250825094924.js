export async function postData(url, data) {
    try {
        const response = await fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        })
        return await response.json();
    } catch (err) {
        console.error('Error AJAX:', err);
        return { success: false, message: 'Error de conexión' };
    }

}