
<h1>Google Appliance</h1>

<p>This module integrates a Google Mini / Google Search Appliance with Drupal.</p>

<h2> Currently it supports the following features:</h2>

<ul>
 <li> Keyword search</li>
 <li> Facilitates other GSA search options (e.g. meta-tag constraints)</li>
 <li> Multiple tabs for specified Front End and Collection combinations</li>
 <li> Arbitrary Front End and Collection combinations</li>
 <li> Works with or without the core search.module</li>
 <li> Caching of results to increase response time and decrease load on GSA</li>
 <li> i18n support to limit language</li>
 <li> Date display on search results</li>
 <li> Type display on search results</li>
 <li> Author display on search results</li>
 <li> KeyMatches (recommended links)</li>
 <li> Synonyms (alternate search terms)</li>
 <li> MIME type display</li>
 <li> Meta-tags (setting, and theming)</li>
 <li> Attributes (theming)</li>
 <li> Standard Drupal pager</li>
 <li> Standard or custom search-result(s) theme templates</li>
 <li> Display cached HTML version</li>
</ul>

<h2> When the first official version is released it will contain:</h2>

<ul>
 <li> Advanced search screen</li>
 <li> Date sorting</li>
 <li> Indexing helper</li>
</ul>

<h2> Installation</h2>

<ol>
  <li> Enable the module </li>
  <li> Go to the settings page and configure your collection name, IP address of your GSA/mini, and caching (if needed)</li>
  <li> Optionally, enable the recommended links block</li>
</ol>

<h2> Usage</h2>

<p>Go to search/google-appliance</p>

<p>Search results are themed using theme('search_results').</p>

<p>Copy modules/search/search-results.tpl.php into your theme directory
to over-ride the default template.</p>

<p>You can also create search-results-google-appliance.tpl.php to theme
ONLY the GSA searches, but note that this template will NOT be seen
unless you also copy the default search-results.tpl.php (even if you
do not wish to edit that one). This alternative name is mostly relevant
if you are leaving the core search.module enabled.</p>

<p>The above notes also apply to search-result.tpl.php</p>

<p>See the preprocess functions for the Google-specific variables
available to the templates. You may wish to print the $range at the
top of your search-results template, for instance.</p>

<p>To theme the search form, copy google-appliance-theme-form.tpl.php into 
your theme directory and modify as desired.</p>