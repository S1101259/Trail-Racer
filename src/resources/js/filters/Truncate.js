export default function(textString, value) {
    if(textString.length > value) {
        return textString.substring(0, value) + '...'
    }
    return textString;
}
