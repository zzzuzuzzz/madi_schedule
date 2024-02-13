let selects = document.getElementsByTagName("option")

for (key of selects){
    console.log('case \'' + key.value + '\'\:\n' +
        '        $select = \'' + key.innerHTML + '\';\n' +
        '        break;')
}
