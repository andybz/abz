<?php
function insert_svg($svg_label, $echo = true) {
  switch($svg_label) {
    case 'arrow-left':
      $svg = '<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="792.082px" height="792.082px" viewBox="0 0 792.082 792.082" style="enable-background:new 0 0 792.082 792.082;" xml:space="preserve"> <g> <g id="_x37__34_"> <g> <path d="M317.896,396.024l304.749-276.467c27.36-27.36,27.36-71.677,0-99.037s-71.677-27.36-99.036,0L169.11,342.161 c-14.783,14.783-21.302,34.538-20.084,53.897c-1.218,19.359,5.301,39.114,20.084,53.897l354.531,321.606 c27.36,27.36,71.677,27.36,99.037,0s27.36-71.677,0-99.036L317.896,396.024z"/> </g> </g> </g> </svg>';
      break;
    case 'arrow-right':
      $svg = '<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 492.004 492.004" style="enable-background:new 0 0 492.004 492.004;" xml:space="preserve"> <g> <g> <path d="M382.678,226.804L163.73,7.86C158.666,2.792,151.906,0,144.698,0s-13.968,2.792-19.032,7.86l-16.124,16.12 c-10.492,10.504-10.492,27.576,0,38.064L293.398,245.9l-184.06,184.06c-5.064,5.068-7.86,11.824-7.86,19.028 c0,7.212,2.796,13.968,7.86,19.04l16.124,16.116c5.068,5.068,11.824,7.86,19.032,7.86s13.968-2.792,19.032-7.86L382.678,265 c5.076-5.084,7.864-11.872,7.848-19.088C390.542,238.668,387.754,231.884,382.678,226.804z"/> </g> </g> </svg>';
      break;
    case 'cart':
      $svg = '<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" x="0" y="0" viewBox="0 0 43.6 34.02" xml:space="preserve" class="boost-cart"><path d="M24.16 25.55c-1.97 0-3.58 1.6-3.58 3.58s1.6 3.58 3.58 3.58 3.58-1.6 3.58-3.58-1.61-3.58-3.58-3.58zm0 5.68c-1.16 0-2.1-.94-2.1-2.11 0-1.16.94-2.1 2.1-2.1 1.16 0 2.1.94 2.1 2.1.01 1.17-.94 2.11-2.1 2.11zM11.27 25.55c-1.97 0-3.58 1.6-3.58 3.58s1.6 3.58 3.58 3.58 3.58-1.6 3.58-3.58-1.61-3.58-3.58-3.58zm0 5.68c-1.16 0-2.11-.94-2.11-2.11 0-1.16.94-2.1 2.11-2.1s2.1.94 2.1 2.1c0 1.17-.94 2.11-2.1 2.11zM3.13 9.18l4.12 14.21h20.93L32.44 8.7h-.01l.28-.93h.01l1.59-5.12 7.18-1.2.24 1.45-6.28 1.05-1.46 4.71-4.7 16.2H6.14L1.17 7.71h1.58z"/></svg>';
      break;
  }

  if ($echo) echo $svg;

  return $svg;
}