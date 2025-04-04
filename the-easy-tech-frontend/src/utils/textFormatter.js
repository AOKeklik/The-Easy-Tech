export const extractPlainText = (html, length = 100) => {
    if (!html) return ""
    
    const plainText = html.replace(/<[^>]*>/g, "").trim()

    return plainText.length > length ? plainText.substring(0, length) + "..." : plainText
}