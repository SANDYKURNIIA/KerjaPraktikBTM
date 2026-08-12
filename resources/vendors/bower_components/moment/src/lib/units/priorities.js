<<<<<<< HEAD
var priorities = {};

export function addUnitPriority(unit, priority) {
    priorities[unit] = priority;
}

export function getPrioritizedUnits(unitsObj) {
    var units = [];
    for (var u in unitsObj) {
        units.push({unit: u, priority: priorities[u]});
    }
    units.sort(function (a, b) {
        return a.priority - b.priority;
    });
    return units;
}
=======
var priorities = {};

export function addUnitPriority(unit, priority) {
    priorities[unit] = priority;
}

export function getPrioritizedUnits(unitsObj) {
    var units = [];
    for (var u in unitsObj) {
        units.push({unit: u, priority: priorities[u]});
    }
    units.sort(function (a, b) {
        return a.priority - b.priority;
    });
    return units;
}
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
