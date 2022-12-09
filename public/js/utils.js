var onlyNumberKeyAndPoint = function (evt) {

    // Only ASCII charactar in that range allowed
    var ASCIICode = (evt.which) ? evt.which : evt.keyCode
    if (ASCIICode > 31 && ASCIICode !== 47 && (ASCIICode < 46 || ASCIICode > 57))
        return false;
    return true;
}