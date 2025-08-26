export async function postData(url, data) {
    try{
        const response = await fetch(url, {
            method: 'POST',
            he
        })

    }catch(err){
        console.error('Error AJAX:', err);
        return { success: false, message: 'Error de conexión' };
    }

}