<<<<<<< HEAD
import { isValid as _isValid } from '../create/valid';
import extend from '../utils/extend';
import getParsingFlags from '../create/parsing-flags';

export function isValid () {
    return _isValid(this);
}

export function parsingFlags () {
    return extend({}, getParsingFlags(this));
}

export function invalidAt () {
    return getParsingFlags(this).overflow;
}
=======
import { isValid as _isValid } from '../create/valid';
import extend from '../utils/extend';
import getParsingFlags from '../create/parsing-flags';

export function isValid () {
    return _isValid(this);
}

export function parsingFlags () {
    return extend({}, getParsingFlags(this));
}

export function invalidAt () {
    return getParsingFlags(this).overflow;
}
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
