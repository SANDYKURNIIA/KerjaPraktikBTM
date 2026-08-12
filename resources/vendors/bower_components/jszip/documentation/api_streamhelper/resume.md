<<<<<<< HEAD
---
title: "resume()"
layout: default
section: api
---

__Description__ : Resume the stream if the stream is paused. Once resumed, the
stream starts sending `data` events again.

__Arguments__ : None.

__Returns__ : The current StreamHelper object, for chaining.

__Throws__ : Nothing.

__Example__

```js
zip
.generateInternalStream({type:"uint8array"})
.on('data', function() {...})
.resume();
```
=======
---
title: "resume()"
layout: default
section: api
---

__Description__ : Resume the stream if the stream is paused. Once resumed, the
stream starts sending `data` events again.

__Arguments__ : None.

__Returns__ : The current StreamHelper object, for chaining.

__Throws__ : Nothing.

__Example__

```js
zip
.generateInternalStream({type:"uint8array"})
.on('data', function() {...})
.resume();
```
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
