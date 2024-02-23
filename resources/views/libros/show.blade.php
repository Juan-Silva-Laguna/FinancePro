<!DOCTYPE html>

<html dir="ltr" mozdisallowselectionprint>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="google" content="notranslate">
    <title>LIBRO</title>
	<link rel="icon" href="{{ asset('assets/img/icon.ico') }}" type="image/x-icon"/>

<!-- This snippet is used in production (included from viewer.html) -->
<link rel="resource" type="application/l10n" href="{{ asset('assets/libros/locale/locale.json')}}">
<script src="{{ asset('assets/libros/recursos/build/pdf.js') }}" type="module"></script>

    <link rel="stylesheet" href="{{ asset('assets/libros/viewer.css') }}">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

  <script src="{{ asset('assets/libros/viewer.js') }}" type="module"></script>
  </head>

  <body tabindex="1">
    <!-- IMPORTANTE AGREGUE CAMBIOS AQUI -->
    <input type="hidden" id="rutaLibro" value="{{ asset($libro->libro) }}">
    <input type="hidden" id="idLibro" value="{{ $libro->id }}">
    <div id="outerContainer">

      <div id="sidebarContainer">
        <div id="toolbarSidebar">
          <div id="toolbarSidebarLeft">
            <div id="sidebarViewButtons" class="splitToolbarButton toggled" role="radiogroup">

            </div>
          </div>

          <div id="toolbarSidebarRight">
            <div id="outlineOptionsContainer" class="hidden">
              <div class="verticalToolbarSeparator"></div>

              <button id="currentOutlineItem" class="toolbarButton" disabled="disabled" title="Find Current Outline Item" tabindex="6" data-l10n-id="pdfjs-current-outline-item-button">
                <span data-l10n-id="pdfjs-current-outline-item-button-label">Current Outline Item</span>
              </button>
            </div>
          </div>
        </div>
        <div id="sidebarContent">
          <div id="thumbnailView">
          </div>
          <div id="outlineView" class="hidden">
          </div>
          <div id="attachmentsView" class="hidden">
          </div>
          <div id="layersView" class="hidden">
          </div>
        </div>
        <div id="sidebarResizer"></div>
      </div>  <!-- sidebarContainer -->

      <div id="mainContainer">
        <div class="findbar hidden doorHanger" id="findbar">
          <div id="findbarInputContainer">
            <span class="loadingInput end">
              <input id="findInput" class="toolbarField" title="Find" placeholder="Find in document…" tabindex="91" data-l10n-id="pdfjs-find-input" aria-invalid="false">
            </span>
            <div class="splitToolbarButton">
              <button id="findPrevious" class="toolbarButton" title="Find the previous occurrence of the phrase" tabindex="92" data-l10n-id="pdfjs-find-previous-button">
                <span data-l10n-id="pdfjs-find-previous-button-label">Previous</span>
              </button>
              <div class="splitToolbarButtonSeparator"></div>
              <button id="findNext" class="toolbarButton" title="Find the next occurrence of the phrase" tabindex="93" data-l10n-id="pdfjs-find-next-button">
                <span data-l10n-id="pdfjs-find-next-button-label">Next</span>
              </button>
            </div>
          </div>

          <div id="findbarOptionsTwoContainer">
           </div>

          <div id="findbarMessageContainer" aria-live="polite">
            <span id="findResultsCount" class="toolbarLabel"></span>
            <span id="findMsg" class="toolbarLabel"></span>
          </div>
        </div>  <!-- findbar -->

        <div class="editorParamsToolbar hidden doorHangerRight" id="editorFreeTextParamsToolbar">
          <div class="editorParamsToolbarContainer">
            <div class="editorParamsSetter">
              <label for="editorFreeTextColor" class="editorParamsLabel" data-l10n-id="pdfjs-editor-free-text-color-input">Color</label>
              <input type="color" id="editorFreeTextColor" class="editorParamsColor" tabindex="100">
            </div>
            <div class="editorParamsSetter">
              <label for="editorFreeTextFontSize" class="editorParamsLabel" data-l10n-id="pdfjs-editor-free-text-size-input">Size</label>
              <input type="range" id="editorFreeTextFontSize" class="editorParamsSlider" value="10" min="5" max="100" step="1" tabindex="101">
            </div>
          </div>
        </div>

        <div class="editorParamsToolbar hidden doorHangerRight" id="editorInkParamsToolbar">
          <div class="editorParamsToolbarContainer">
            <div class="editorParamsSetter">
              <label for="editorInkColor" class="editorParamsLabel" data-l10n-id="pdfjs-editor-ink-color-input">Color</label>
              <input type="color" id="editorInkColor" class="editorParamsColor" tabindex="102">
            </div>
            <div class="editorParamsSetter">
              <label for="editorInkThickness" class="editorParamsLabel" data-l10n-id="pdfjs-editor-ink-thickness-input">Thickness</label>
              <input type="range" id="editorInkThickness" class="editorParamsSlider" value="1" min="1" max="20" step="1" tabindex="103">
            </div>
            <div class="editorParamsSetter">
              <label for="editorInkOpacity" class="editorParamsLabel" data-l10n-id="pdfjs-editor-ink-opacity-input">Opacity</label>
              <input type="range" id="editorInkOpacity" class="editorParamsSlider" value="100" min="1" max="100" step="1" tabindex="104">
            </div>
          </div>
        </div>


        <div class="toolbar">
          <div id="toolbarContainer">
            <div id="toolbarViewer">
              <div id="toolbarViewerLeft">
                <button id="sidebarToggle" class="toolbarButton" title="Toggle Sidebar" tabindex="11" data-l10n-id="pdfjs-toggle-sidebar-button" aria-expanded="false" aria-controls="sidebarContainer">
                  <span data-l10n-id="pdfjs-toggle-sidebar-button-label">Toggle Sidebar</span>
                </button>
                <div class="toolbarButtonSpacer"></div>
                <button id="viewFind" class="toolbarButton" title="Find in Document" tabindex="12" data-l10n-id="pdfjs-findbar-button" aria-expanded="false" aria-controls="findbar">
                  <span data-l10n-id="pdfjs-findbar-button-label">Find</span>
                </button>
                <div class="splitToolbarButton hiddenSmallView">
                  <button class="toolbarButton" title="Previous Page" id="previous" tabindex="13" data-l10n-id="pdfjs-previous-button">
                    <span data-l10n-id="pdfjs-previous-button-label">Previous</span>
                  </button>
                  <div class="splitToolbarButtonSeparator"></div>
                  <button class="toolbarButton" title="Next Page" id="next" tabindex="14" data-l10n-id="pdfjs-next-button">
                    <span data-l10n-id="pdfjs-next-button-label">Next</span>
                  </button>
                </div>
                <span class="loadingInput start">
                  <input type="number" id="pageNumber" class="toolbarField" title="Page" value="1" min="1" tabindex="15" data-l10n-id="pdfjs-page-input" autocomplete="off">
                </span>
                <span id="numPages" class="toolbarLabel"></span>
              </div>
              <div id="toolbarViewerRight">
                <div id="editorModeButtons" class="splitToolbarButton toggled" role="radiogroup">

                  <button id="editorInk" class="toolbarButton" disabled="disabled" title="Draw" role="radio" aria-checked="false" aria-controls="editorInkParamsToolbar" tabindex="32" data-l10n-id="pdfjs-editor-ink-button">
                    <span data-l10n-id="pdfjs-editor-ink-button-label">Draw</span>
                  </button>
                </div>

                <div id="editorModeSeparator" class="verticalToolbarSeparator"></div>

                <button id="print" class="toolbarButton hiddenMediumView" title="Print" tabindex="41" data-l10n-id="pdfjs-print-button">
                  <span data-l10n-id="pdfjs-print-button-label">Print</span>
                </button>

                <button id="download" class="toolbarButton hiddenMediumView" title="Save" tabindex="42" data-l10n-id="pdfjs-save-button">
                  <span data-l10n-id="pdfjs-save-button-label">Save</span>
                </button>

                <div class="verticalToolbarSeparator hiddenMediumView"></div>

              </div>
              <div id="toolbarViewerMiddle">
                <div class="splitToolbarButton">
                  <button id="zoomOut" class="toolbarButton" title="Zoom Out" tabindex="21" data-l10n-id="pdfjs-zoom-out-button">
                    <span data-l10n-id="pdfjs-zoom-out-button-label">Zoom Out</span>
                  </button>
                  <div class="splitToolbarButtonSeparator"></div>
                  <button id="zoomIn" class="toolbarButton" title="Zoom In" tabindex="22" data-l10n-id="pdfjs-zoom-in-button">
                    <span data-l10n-id="pdfjs-zoom-in-button-label">Zoom In</span>
                   </button>
                </div>
                <span id="scaleSelectContainer" class="dropdownToolbarButton" style="display: none;">
                  <select id="scaleSelect" title="Zoom" tabindex="23" data-l10n-id="pdfjs-zoom-select">
                    <option id="customScaleOption" title="" value="custom" disabled="disabled" hidden="true" data-l10n-id="pdfjs-page-scale-percent" data-l10n-args='{ "scale": 0 }'>0%</option>
                  </select>
                </span>
              </div>
            </div>
            <div id="loadingBar">
              <div class="progress">
                <div class="glimmer">
                </div>
              </div>
            </div>
          </div>
        </div>

        <div id="viewerContainer" tabindex="0">
          <div id="viewer" class="pdfViewer"></div>
        </div>
      </div> <!-- mainContainer -->

    </div> <!-- outerContainer -->
    <div id="printContainer"></div>

    <input type="file" id="fileInput" class="hidden">
  </body>
</html>
