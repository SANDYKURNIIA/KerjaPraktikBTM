<<<<<<< HEAD
// Side effect imports
import './prototype';

import {
    getSetGlobalLocale,
    defineLocale,
    updateLocale,
    getLocale,
    listLocales
} from './locales';

import {
    listMonths,
    listMonthsShort,
    listWeekdays,
    listWeekdaysShort,
    listWeekdaysMin
} from './lists';

export {
    getSetGlobalLocale,
    defineLocale,
    updateLocale,
    getLocale,
    listLocales,
    listMonths,
    listMonthsShort,
    listWeekdays,
    listWeekdaysShort,
    listWeekdaysMin
};

import { deprecate } from '../utils/deprecate';
import { hooks } from '../utils/hooks';

hooks.lang = deprecate('moment.lang is deprecated. Use moment.locale instead.', getSetGlobalLocale);
hooks.langData = deprecate('moment.langData is deprecated. Use moment.localeData instead.', getLocale);

import './en';
=======
// Side effect imports
import './prototype';

import {
    getSetGlobalLocale,
    defineLocale,
    updateLocale,
    getLocale,
    listLocales
} from './locales';

import {
    listMonths,
    listMonthsShort,
    listWeekdays,
    listWeekdaysShort,
    listWeekdaysMin
} from './lists';

export {
    getSetGlobalLocale,
    defineLocale,
    updateLocale,
    getLocale,
    listLocales,
    listMonths,
    listMonthsShort,
    listWeekdays,
    listWeekdaysShort,
    listWeekdaysMin
};

import { deprecate } from '../utils/deprecate';
import { hooks } from '../utils/hooks';

hooks.lang = deprecate('moment.lang is deprecated. Use moment.locale instead.', getSetGlobalLocale);
hooks.langData = deprecate('moment.langData is deprecated. Use moment.localeData instead.', getLocale);

import './en';
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
