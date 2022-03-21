/**
 * What Time Is It
 * Javascript
 */

function wtii_widget_offset_process(wtii_offset) {
    Date.prototype.stdTimezoneOffset = function() {
        var jan = new Date(this.getFullYear(), 0, 1);
        var janUTC = jan.getTime() + (jan.getTimezoneOffset() * 60000);
        var janOffset = new Date(janUTC + (3600000 * wtii_offset));
        var jul = new Date(this.getFullYear(), 6, 1);
        var julUTC = jul.getTime() + (jul.getTimezoneOffset() * 60000);
        var julOffset = new Date(julUTC + (3600000 * wtii_offset));
        return Math.max(jan.getTimezoneOffset(), jul.getTimezoneOffset());
        //return Math.max(janOffset, julOffset);
    }
    Date.prototype.dst = function() {
        if( parseFloat(wtii_offset) <= -4 && parseFloat(wtii_offset) >= -10 ) {
            var dCheck = new Date;
            var utcCheck = dCheck.getTime() + (dCheck.getTimezoneOffset() * 60000);
            var newCheck = new Date(utcCheck + (3600000 * wtii_offset));
            return this.getTimezoneOffset() < this.stdTimezoneOffset();
            //return newCheck.getTimezoneOffset() < this.stdTimezoneOffset();
        }
    }
    var dateCheck = new Date;
    if( dateCheck.dst() ) {
       wtii_offset = parseFloat(wtii_offset) + 1;
    };

    return wtii_offset;
}