CHANGELOG for 3.2.x
===================

This changelog references the relevant changes (bug and security fixes) done
in 3.2 minor versions.

To get the diff for a specific change, go to https://github.com/symfony/symfony/commit/XXX where XXX is the change hash
To get the diff between two versions, go to https://github.com/symfony/symfony/compare/v3.2.0...v3.2.1

* 3.2.0 (2016-11-30)

 * bug #20687 [FrameworkBundle] Forbid env parameters in routing configuration (nicolas-grekas)
 * bug #20607 [Validator] Bring egulias/email-validator ~2.0 to parity with ~1.2 (Lctrs)
 * bug #20671 [Config] ConfigCache::isFresh() should return false when unserialize() fails (nicolas-grekas)
 * bug #20679 [VarDumper] Use default color for ellipsed namespaces/paths (nicolas-grekas)
 * bug #20676 [ClassLoader] Use only forward slashes in generated class map (nicolas-grekas)
 * bug #20664 [Validator] ensure the proper context for nested validations (xabbuh)
 * bug #20661 bug #20653 [WebProfilerBundle] Profiler includes ghost panels (jzawadzki)
 * bug #20652 Fixed getRouteParams() when no parameters are available (wouterj)

* 3.2.0-RC2 (2016-11-27)

 * bug #20601 [FrameworkBundle] Don't rely on any parent definition for "cache.annotations" (nicolas-grekas)
 * bug #20638 Fix legacy tests that do not trigger any depreciation (julienfalque)
 * bug #20374 [FrameworkBundle] Improve performance of ControllerNameParser (enumag)
 * bug #20474 [Routing] Fail properly when a route parameter name cannot be used as a PCRE subpattern name (fancyweb)
 * bug #20616 [Bridge/Doctrine] Use cache.prefix.seed parameter for generating cache namespace (nicolas-grekas)
 * bug #20566 [DI] Initialize properties before method calls (ro0NL)
 * bug #20583 [Workflow] Fixed graphviz dumper for state machine (lyrixx)
 * bug #20621 [HttpKernel] Fix exception when serializing request attributes (nicolas-grekas)
 * bug #20609 [DI] Fixed custom services definition BC break introduced in ec7e70fb… (kiler129)
 * bug #20598 [DI] Aliases should preserve the aliased invalid behavior (nicolas-grekas)
 * bug #20600 [Process] Fix process continuing after reached timeout using getIterator() (chalasr)
 * bug #20603 [HttpKernel] Deprecate checking for cacheable HTTP methods in Request::isMethodSafe() (nicolas-grekas)
 * bug #20602 [HttpKernel] Revert BC breaking change of Request::isMethodSafe() (nicolas-grekas)
 * bug #20610 [FrameworkBundle] Add framework.cache.prefix_seed for predictible cache key prefixes (nicolas-grekas)
 * bug #20595 [WebProfilerBundle] Fix deprecated uses of profiler_dump (nicolas-grekas)
 * bug #20589 [SecurityBundle] Fix FirewallConfig nullable arguments (ogizanagi)
 * bug #20590 [DI] Allow null as default env value (sroze)
 * bug #20499 [Doctrine][Form] support large integers (xabbuh)
 * bug #20559 [FrameworkBundle] Avoid warming up the validator cache for non-existent class (Seldaek)
 * bug #20576 [Process] Do feat test before enabling TTY mode (nicolas-grekas)
 * bug #20577 [FrameworkBundle] Mark cache.default_*_provider services private (nicolas-grekas)
 * bug #20550 [YAML] Fix processing timestamp strings with timezone (myesain)
 * bug #20543 [DI] Fix error when trying to resolve a DefinitionDecorator (nicolas-grekas)
 * bug #20544 [PhpUnitBridge] Fix time-sensitive tests that use data providers (julienfalque)

* 3.2.0-RC1 (2016-11-17)

 * feature #20533 [DI] Revert "deprecate get() for uncompiled container builders" (nicolas-grekas)
 * bug #20525 [TwigBundle] Give some love to exception pages (nicolas-grekas)
 * bug #20484 bumped min version of Twig to 1.28 (fabpot)
 * bug #20512 [DI] Fix accepting null as default env param value (nicolas-grekas)
 * bug #20519 [Debug] Remove GLOBALS from exception context to avoid endless recursion (Seldaek)
 * bug #20455 [ClassLoader] Fix ClassCollectionLoader inlining with __halt_compiler (giosh94mhz)
 * bug #20307 [Form] Fix Date\TimeType marked as invalid on request with single_text and zero seconds (LuisDeimos)
 * bug #20432 [FrameworkBundle] Add --no-prefix option to translation:update (chalasr)
 * bug #20480 [FrameworkBundle] Register the ArrayDenormalizer (dunglas)
 * bug #20286 [Serializer] Fix DataUriNormalizer's regex (dunglas)
 * bug #20466 [Translation] fixed nested fallback catalogue  using multiple locales. (aitboudad)
 * bug #20465 [#18637][TranslationDebug] workaround for getFallbackLocales. (aitboudad)
 * bug #20453 [Cache] Make directory hashing case insensitive (nicolas-grekas)
 * bug #20428 [TwigBundle] fixed template root path (fabpot)
 * feature #20447 [DI] Force env params to be string|null (nicolas-grekas)
 * feature #20451 [Workflow] Added Definition builder (Nyholm)
 * bug #20460 [FrameworkBundle] Fixed WorkflowCommand to support state machines (HeahDude)
 * bug #20440 [TwigBridge][TwigBundle][HttpKernel] prefer getSourceContext() over getSource() (xabbuh)
 * feature #19629 [Workflow] Make the Workflow support State Machines (Nyholm, lyrixx)
 * bug #20287 Properly format value in UniqueEntityValidator (alcaeus)
 * bug #20422 [Translation][fallback] add missing resources in parent catalogues. (aitboudad)
 * bug #20378 [Form] Fixed show float values as choice value in ChoiceType (yceruto)
 * feature #20416 [Bridge\Monolog][FrameworkBundle] Add & wire a DebugProcessor (nicolas-grekas)
 * bug #20415 [DI][Serializer] Add missing deprecations (nicolas-grekas)
 * bug #20294 Improved the design of the metrics in the profiler (javiereguiluz)
 * bug #20375 [HttpFoundation][Session] Fix memcache session handler (klandaika)
 * bug #20377 [Console] Fix infinite loop on missing input (chalasr)
 * feature #20232 [DependencyInjection] fixed ini file values conversion (fabpot)
 * feature #19490 [SecurityBundle] Integrate current firewall in Profiler (chalasr)
 * feature #19398 [DX][SecurityBundle] Introduce a FirewallConfig class accessible from FirewallContext (chalasr)
 * bug #20336 [HttpKernel] Base DataCollector throws warning on unsupported scheme strings (ogizanagi)
 * bug #20335 [Yaml] Fix String offset cast error in Inline parser (romainneutron)
 * bug #20372 [Console] simplified code (fabpot)
 * bug #20342 [Form] Fix UrlType transforms valid protocols (ogizanagi)
 * bug #20341 Fix YamlReferenceDumper unnamed nested prototypes (ogizanagi)
 * bug #20292 Enhance GAE compat by removing some realpath() (nicolas-grekas)
 * bug #20325 [VarDumper] Fix source links to Twig files (nicolas-grekas)
 * bug #20328 [Console] Fix empty COLUMNS/LINES env vars (nicolas-grekas)
 * bug #20326 [VarDumper] Fix dumping Twig source in stack traces (nicolas-grekas)
 * bug #20321 Compatibility with Twig 1.27 (xkobal)

* 3.2.0-BETA1 (2016-10-27)

 * feature #19973 Added a default ide file link web view (jeremyFreeAgent)
 * feature #20285 [TwigBundle] made Twig cache independent of the project root directory (fabpot)
 * feature #20266 [Console] rename Command::private to Command::hidden (xabbuh)
 * feature #20270 [PhpUnitBridge] Drop ErrorAssert (nicolas-grekas)
 * feature #20256 [PhpUnitBridge] Allow configuring removed deps and phpunit versions (nicolas-grekas)
 * feature #20255 [PhpUnitBridge] Replace ErrorAssert by `@expectedDeprecation` (nicolas-grekas)
 * feature #20047 [Form] Change FormTypeGuesserChain to accept Traversable (enumag)
 * feature #19982 [Validator] Allow validating multiple groups in one GroupSequence step (enumag)
 * feature #19741 [ExpressionLanguage] Making cache PSR6 compliant (Alexandre GESLIN)
 * feature #20217 [Serializer] Support specifying format for DateTimeNormalizer::denormalize (teohhanhui)
 * feature #19452 Remove the new SecurityUserValueResolver (weaverryan)
 * feature #15002 [DoctrineBridge] Add a way to select the repository used by the UniqueEntity validator (ogizanagi)
 * feature #20113 Use the method map as authoritative list of factories for dumped containers (stof)
 * feature #19576 [WebProfiler] added support for window.fetch calls in ajax section (ivoba)
 * feature #19991 [TwigBridge] Added access to token from twig AppVariable (HeahDude)
 * feature #20029 Hide commands from ApplicationDescriptor, but allow invoking (jwdeitch, Jordan Deitch)
 * feature #20121 Class existence resource (fabpot)
 * feature #20119 [TwigBundle] changed the runtime loader to return null if there is no match (fabpot)
 * feature #20093 Twig extensions refatoring to decouple definitions from implementations (fabpot)
 * feature #20094 added Twig runtimes for "critical" Twig extensions (fabpot)
 * feature #20097 [FrameworkBundle] removed the Doctrine Annotations lib dependency on FrameworkBundle (fabpot)
 * feature #20019 [FrameworkBundle] Add phpstorm ide (hason)
 * feature #20092 added a Twig runtime loader (fabpot)
 * feature #20075 [FrameworkBundle] removed the Security Core and Security CSRF component dependencies on FrameworkBundle (fabpot)
 * feature #20072 [FrameworkBundle] removed the Templating component dependency on FrameworkBundle (fabpot)
 * feature #20070 [FrameworkBundle] removed the Translation component dependency on FrameworkBundle (fabpot)
 * feature #20067 [FrameworkBundle] removed the Asset component dependency on FrameworkBundle (fabpot)
 * feature #20037 [Cache] Handle arbitrary key length when the backend cant using hashing (nicolas-grekas)
 * feature #20040 [Bridge/PhpUnit] Handle native E_DEPRECATED (nicolas-grekas)
 * feature #19987 [VarDumper] Use ClassStub for reflected types (nicolas-grekas)
 * feature #20012 [Translation] added Base Exception for the component. (aitboudad)
 * feature #19996 removed obsolete images (since 2.2) (fabpot)
 * feature #19997 inlined some CSS (fabpot)
 * feature #19304 [Yaml] fix parsing multi-line mapping values (xabbuh)
 * feature #19191 [DependencyInjection] Automatically detect the definitions class when possible (Ener-Getick)
 * feature #19745 [Validator] Added context object method callback to choice validator (Peter Bouwdewijn)
 * feature #19614 [HttpKernel] Use VarDumper in the profiler (wouterj, nicolas-grekas)
 * feature #19480 [Config] Fix (Yaml|Xml)ReferenceDumper for nested prototypes (ogizanagi)
 * feature #19681 [DI] Allow injecting ENV parameters at runtime using env(MY_ENV_VAR) (nicolas-grekas)
 * feature #19197 [Serializer][FrameworkBundle] Add a CSV encoder (dunglas)
 * feature #19257 [Validator][Choice] Make strict the default option for choice validation (peterrehm)
 * feature #19326 [Serializer][FrameworkBundle] Add a YAML encoder (dunglas)
 * feature #19484 [PropertyInfo] Extract the logic converting a php doc to a Type (Ener-Getick)
 * feature #19495 [master][console] Allow multiple options to be set. (SpacePossum)
 * feature #19584 [DependencyInjection] Improve ParameterNotFoundException when accessing a nested parameter (wouterj)
 * feature #19485 [FrameworkBundle] Introduce a cache warmer for Validator based on PhpArrayAdapter (tgalopin)
 * feature #19790 [FrameworkBundle] add support for prioritizing form type extension tags (dmaicher)
 * feature #19507 [FrameworkBundle] Introduce a cache warmer for Serializer based on PhpArrayAdapter (tgalopin)
 * feature #19734 [HttpFoundation] Deprecate extending some methods (Ener-Getick)
 * feature #19795 Replace count with a given number out of the box (bocharsky-bw)
 * feature #19807 [FrameworkBundle] Add debug.file_link_format with remapping for IDE links (nicolas-grekas)
 * feature #19891 [FrameworkBundle] Add cache:pool:clear command (nicolas-grekas)
 * feature #19900 [FrameworkBundle] Add CachePoolClearerPass for weak cache pool refs in cache clearers (nicolas-grekas)
 * feature #19570 [Config] Fix YamlReferenceDumper prototyped array support (ogizanagi)
 * feature #19824 [Console] Add ability to regress the ProgressBar (jameshalsall)
 * feature #19892 [DI] Add corresponding service id in some exception messages (nicolas-grekas)
 * feature #19843 [Security] Allow run-time configuration of hash algo (nicolas-grekas)
 * feature #19894 [Cache] Add "persistent_id" option to RedisAdapter::createConnection() (nicolas-grekas)
 * feature #19915 [Bridge/PhpUnit] Add bin/simple-phpunit wrapper (=phpunit - yaml - prophecy) (nicolas-grekas)
 * feature #19826 [VarDumper] Add ClassStub for clickable & shorter PHP identifiers (nicolas-grekas)
 * feature #19816 [VarDumper] Add LinkStub to create links in HTML dumps (nicolas-grekas)
 * feature #19768 [VarDumper] Enhance dumping arguments in stack traces (nicolas-grekas)
 * feature #19796 [VarDumper] Make the line clickable to toggle dumps (nicolas-grekas)
 * feature #19764 [Config] Add ExprBuilder::ifEmpty() (ogizanagi)
 * feature #19797 [VarDumper] Handle attributes in Data clones for more semantic dumps (nicolas-grekas)
 * feature #19755 [VarDumper] Get dump as string with `$dumper->dump(..., true);` (nicolas-grekas)
 * feature #19604 [Routing] Add seamless support for unicode requirements (nicolas-grekas)
 * feature #19714 [VarDumper] Handle "title" attribute on virtual properties (nicolas-grekas)
 * feature #19687 [FrameworkBundle] Use relative paths in templates paths cache (tgalopin)
 * feature #19339 [WebProfilerBundle][Form][DX] To expand the form nodes that contains children with errors (yceruto)
 * feature #19519 [Cache] Add PDO + Doctrine DBAL adapter (nicolas-grekas)
 * feature #19672 [VarDumper] Allow dumping subparts of cloned Data structures (nicolas-grekas)
 * feature #19657 [VarDumper] Add line in trace indexes (nicolas-grekas)
 * feature #19639 [Routing] Generate URLs in compliance with PHP_QUERY_RFC3986 (jameshalsall)
 * feature #19568 [Debug] Better error handling (lyrixx)
 * feature #19552 [HttpFoundation] Add named constructor on JsonResponse (tyx)
 * feature #19630 [VarDumper] Enhance dumping __PHP_Incomplete_Class objects (nicolas-grekas)
 * feature #19515 [Cache] Drop TaggedCacheItemInterface (nicolas-grekas)
 * feature #19511 Use a dedicated exception in the file locator (leofeyer)
 * feature #19529 Add Yaml::PARSE_EXCEPTION_ON_DUPLICATE to throw exceptions on duplicates (Alex Pott)
 * feature #19473 [Security] Expose the required roles in AccessDeniedException (Nicofuma)
 * feature #19524 [Cache] Add generic TagAwareAdapter wrapper (replaces TagAwareRedisAdapter) (nicolas-grekas)
 * feature #19504 [Yaml] deprecate missing space after mapping key colon (xabbuh)
 * feature #19430 [DomCrawler] Add support for XPath expression evaluation (jakzal)
 * feature #19205 [HttpKernel] Allow bundles to declare classes and annotated classes to compile using patterns (tgalopin)
 * feature #18533 [FrameworkBundle] Wire PhpArrayAdapter with a new cache warmer for annotations (tgalopin)
 * feature #17498 [Filesystem] Add a cross-platform readlink method (tgalopin)
 * feature #19289 [VarDumper] Dumping exceptions is now more compact (nicolas-grekas)
 * feature #19276 [ClassLoader] Add ClassCollectionLoader::inline() to generate inlined-classes files (nicolas-grekas)
 * feature #19325 [FrameworkBundle] Allow to specify a domain when updating translations (antograssiot)
 * feature #19277 [Serializer] Argument objects (theofidry, dunglas)
 * feature #19322 [HttpFoundation] Add Request::isMethodIdempotent method (dunglas)
 * feature #18510 Added a SecurityUserValueResolver for controllers (iltar)
 * feature #19203 [Bridge/Doctrine] Reset the EM lazy-proxy instead of the EM service (nicolas-grekas)
 * feature #19236 [FrameworkBundle] Deprecate the service serializer.mapping.cache.doctrine.apc (Ener-Getick)
 * feature #19174 [FrameworkBundle] Show server:run logs by default (nicolas-grekas)
 * feature #19137 [Serializer] Allow to use easily static constructors (Ener-Getick)
 * feature #19146 [DependencyInjection] deprecate access to private shared services. (hhamon)
 * feature #19190 [DependencyInjection] Add support for short services configurators syntax (voronkovich)
 * feature #18823 [Cache] Add PhpArrayAdapter to use shared memory on PHP 7.0 (tgalopin)
 * feature #18948 [VarDumper] Add maxDepth & maxStringLength display options (MGDSoft, nicolas-grekas)
 * feature #18626 [Yaml] Added support for parsing PHP constants (HeahDude)
 * feature #19104 Adds support for the SameSite attribute in cookies. (iangcarroll)
 * feature #19153 [Validator] support egulias/email-validator 2.x (xabbuh)
 * feature #11394 [Routing] support for array values in route defaults (xabbuh)
 * feature #11882 [Workflow] Introducing the workflow component (fabpot, lyrixx)
 * feature #19151 [VarDumper] Add support for XmlReader objects (Taluu)
 * feature #18471 [Console] Add Lockable trait (geoffrey-brier)
 * feature #19139 [FrameworkBundle][Yaml] Move YamlLintCommand to the Yaml component (chalasr)
 * feature #19143 Response headers fix (fabpot)
 * feature #16809 [Form][FrameworkBundle][Bridge] Add a DateInterval form type (MisatoTremor)
 * feature #18466 [Bridge][Twig] Optionally pass dumper into DumpExtension (CarsonF)
 * feature #18022 [DependencyInjection] Sort the CompilerPass by priority (Ener-Getick)
 * feature #19090 [Console] Add ConsoleLogger::hasErrored() (nicolas-grekas)
 * feature #19079 [Debug] Do not quote numbers in stack trace (c960657)
 * feature #19012 [Console] progress bar fix (TomasVotruba, fabpot)
 * feature #19047 [Cache] Add tags based invalidation + TagAwareRedisAdapter (nicolas-grekas)
 * feature #17644 Deprecate using Form::isValid() with an unsubmitted form (Ener-Getick)
 * feature #12979 [Router] added appending of new optional document fragment (rodnaph)
 * feature #18710 [Console] Simplify simulation of user inputs in CommandTester (chalasr)
 * feature #18999 [Console] Centralize input stream in base Input class (chalasr)
 * feature #19060 [ExpressionLanguage] Add a way to hook on each node when dumping the AST (nicolas-grekas)
 * feature #18880 [PhpUnitBridge] add a triggered errors assertion helper (xabbuh)
 * feature #16906 [Console] Better support for one command app (lyrixx)
 * feature #17203 Move Constraint validator test case to Test namespace (WouterJ)
 * feature #18502 [FrameworkBundle] Add file helper to Controller (dfridrich)
 * feature #19053 [Process] Allow inheriting env vars instead of replacing them (nicolas-grekas)
 * feature #18833 [HttpKernel] Move duplicated logic from Esi/Ssi to an AbstractSurrogate (chalasr)
 * feature #18220 Don't send default cache header for 301 redirects (e-moe)
 * feature #17662 [Translation][transChoice] allows escaping the pipe character. (aitboudad)
 * feature #18322 [DomCrawler] Attach label to form fields (carlosV2)
 * feature #18482 Created a trait to sort tagged services (iltar)
 * feature #15458 [Filesystem] Add feature to create hardlinks for files (andrerom)
 * feature #18940 [Console] Add path argument to dump a specific option in debug:config (chalasr)
 * feature #19013 [ExpressionLanguage] Added a way to dump the AST (lyrixx)
 * feature #18332 [Form] added `CallbackChoiceLoader` and refactored ChoiceType's children (HeahDude)
 * feature #18869 [Routing] Throw exception when PHP start tag is missing (WouterJ)
 * feature #18781 [Console] Display errors in quiet mode (multi-io)
 * feature #19011 [HttpKernel] Add convenient method ArgumentResolver:: getDefaultArgumentValueResolvers (romainneutron)
 * feature #18568 [WebProfilerBundle] Fix bundle usage in Content-Security-Policy context without unsafe-inline (romainneutron)
 * feature #16838 [PropertyAccess] Add PSR-6 cache (dunglas)
 * feature #18790 [Console] Show aliases in command description instead of in different lines in application description (juanmirod)
 * feature #18728 deprecate get() for uncompiled container builders (xabbuh)
 * feature #18483 [Serializer] Deprecate SerializerAwareEncoder (JhonnyL)
 * feature #18337 [PropertyInfo] Support singular adder and remover (dunglas)
 * feature #18894 [Cache] Added PhpFilesAdapter (trakos, nicolas-grekas)
 * feature #18964 [PhpUnitBridge] Make DnsMock match namespaces that begin with Tests\\ (teohhanhui)
 * feature #18726 [PhpUnitBridge] Make ClockMock match namespaces that begin with Tests\\ (teohhanhui)
 * feature #18825 [Cache] Create NullAdapter to disable cache if needed (tgalopin)
 * feature #18675 [VarDumper] Add Redis caster (nicolas-grekas)
 * feature #18785 [Yaml] deprecate comma separators in floats (xabbuh)
 * feature #18486 [Yaml] Allow using _ in some numeric notations (Taluu)
