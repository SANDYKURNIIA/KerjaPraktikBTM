<<<<<<< HEAD
import { createLocal } from '../create/local';
import { createUTC } from '../create/utc';
import { createInvalid } from '../create/valid';
import { isMoment } from './constructor';
import { min, max } from './min-max';
import { now } from './now';
import momentPrototype from './prototype';

function createUnix (input) {
    return createLocal(input * 1000);
}

function createInZone () {
    return createLocal.apply(null, arguments).parseZone();
}

export {
    now,
    min,
    max,
    isMoment,
    createUTC,
    createUnix,
    createLocal,
    createInZone,
    createInvalid,
    momentPrototype
};
=======
import { createLocal } from '../create/local';
import { createUTC } from '../create/utc';
import { createInvalid } from '../create/valid';
import { isMoment } from './constructor';
import { min, max } from './min-max';
import { now } from './now';
import momentPrototype from './prototype';

function createUnix (input) {
    return createLocal(input * 1000);
}

function createInZone () {
    return createLocal.apply(null, arguments).parseZone();
}

export {
    now,
    min,
    max,
    isMoment,
    createUTC,
    createUnix,
    createLocal,
    createInZone,
    createInvalid,
    momentPrototype
};
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
