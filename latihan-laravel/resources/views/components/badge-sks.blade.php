@php
    $kelas = $sks < 3 ? 'bg-warning text-dark' : 'bg-success';
@endphp

<span class="badge {{ $kelas }}">
    {{ $sks }} SKS
</span>