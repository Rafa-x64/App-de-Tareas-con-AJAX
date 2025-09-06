export async function enviarJSON(url, datos) {
    try {
        const res = await fetch(url, {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify(datos)
        });
        if (!res.ok) throw new Error("Error en la respuesta del servidor");
        return await res.json();
    } catch (error) {
        console.error("Error en enviarJSON:", error);
        return { estado: "error", mensaje: error.message };
    }
}