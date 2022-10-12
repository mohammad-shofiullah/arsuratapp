<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Dashboard
Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('dashboard.index'));
});

// Archive
Breadcrumbs::for('arsip', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Arsip Surat', route('archives.index'));
});

// Archive > Add Archive
Breadcrumbs::for('arsip_tambah', function (BreadcrumbTrail $trail) {
    $trail->parent('arsip');
    $trail->push('Unggah', route('archives.create'));
});

// Archive > show
Breadcrumbs::for('arsip_lihat', function (BreadcrumbTrail $trail, $archive) {
    $trail->parent('arsip');
    $trail->push('Lihat', route('archives.show', ['archive' => $archive]));
    $trail->push($archive->judul, route('archives.show', ['archive' => $archive]));
});
