<?php

namespace RectorPrefix20210624;

if (\class_exists('t3lib_cache_backend_MemcachedBackend')) {
    return;
}
class t3lib_cache_backend_MemcachedBackend
{
}
\class_alias('t3lib_cache_backend_MemcachedBackend', 't3lib_cache_backend_MemcachedBackend', \false);
