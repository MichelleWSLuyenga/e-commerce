<?
if(empty($_POST['ip'])){
	$_POST['ip'] = $_SERVER['REMOTE_ADDR'];
}
require('./phpip2country.class.php');

include('../../connect.php');

$reseller_id = $_POST["reseller_id"];

$id_1 = $_POST["id_1"];
$price_1 = $_POST["price_1"];
$id_2 = $_POST["id_2"];
$price_2 = $_POST["price_2"];
$id_3 = $_POST["id_3"];
$price_3 = $_POST["price_3"];
$id_4 = $_POST["id_4"];
$price_4 = $_POST["price_4"];
$id_5 = $_POST["id_5"];
$price_5 = $_POST["price_5"];
$id_6 = $_POST["id_6"];
$price_6 = $_POST["price_6"];
$id_7 = $_POST["id_7"];
$price_7 = $_POST["price_7"];
$id_8 = $_POST["id_8"];
$price_8 = $_POST["price_8"];
$id_9 = $_POST["id_9"];
$price_9 = $_POST["price_9"];
$id_10 = $_POST["id_10"];
$price_10 = $_POST["price_10"];
$id_11 = $_POST["id_11"];
$price_11 = $_POST["price_11"];
$id_12 = $_POST["id_12"];
$price_12 = $_POST["price_12"];
$id_13 = $_POST["id_13"];
$price_13 = $_POST["price_13"];
$id_14 = $_POST["id_14"];
$price_14 = $_POST["price_14"];
$id_15 = $_POST["id_15"];
$price_15 = $_POST["price_15"];
$id_16 = $_POST["id_16"];
$price_16 = $_POST["price_16"];
$id_17 = $_POST["id_17"];
$price_17 = $_POST["price_17"];
$id_18 = $_POST["id_18"];
$price_18 = $_POST["price_18"];
$id_19 = $_POST["id_19"];
$price_19 = $_POST["price_19"];
$id_20 = $_POST["id_20"];
$price_20 = $_POST["price_20"];
$id_21 = $_POST["id_21"];
$price_21 = $_POST["price_21"];
$id_22 = $_POST["id_22"];
$price_22 = $_POST["price_22"];
$id_23 = $_POST["id_23"];
$price_23 = $_POST["price_23"];
$id_24 = $_POST["id_24"];
$price_24 = $_POST["price_24"];
$id_25 = $_POST["id_25"];
$price_25 = $_POST["price_25"];
$id_26 = $_POST["id_26"];
$price_26 = $_POST["price_26"];
$id_27 = $_POST["id_27"];
$price_27 = $_POST["price_27"];
$id_28 = $_POST["id_28"];
$price_28 = $_POST["price_28"];
$id_29 = $_POST["id_29"];
$price_29 = $_POST["price_29"];
$id_30 = $_POST["id_30"];
$price_30 = $_POST["price_30"];
$id_31 = $_POST["id_31"];
$price_31 = $_POST["price_31"];
$id_32 = $_POST["id_32"];
$price_32 = $_POST["price_32"];
$id_33 = $_POST["id_33"];
$price_33 = $_POST["price_33"];
$id_34 = $_POST["id_34"];
$price_34 = $_POST["price_34"];
$id_35 = $_POST["id_35"];
$price_35 = $_POST["price_35"];
$id_36 = $_POST["id_36"];
$price_36 = $_POST["price_36"];
$id_37 = $_POST["id_37"];
$price_37 = $_POST["price_37"];
$id_38 = $_POST["id_38"];
$price_38 = $_POST["price_38"];
$id_39 = $_POST["id_39"];
$price_39 = $_POST["price_39"];
$id_40 = $_POST["id_40"];
$price_40 = $_POST["price_40"];
$id_41 = $_POST["id_41"];
$price_41 = $_POST["price_41"];
$id_42 = $_POST["id_42"];
$price_42 = $_POST["price_42"];
$id_43 = $_POST["id_43"];
$price_43 = $_POST["price_43"];
$id_44 = $_POST["id_44"];
$price_44 = $_POST["price_44"];
$id_45 = $_POST["id_45"];
$price_45 = $_POST["price_45"];
$id_46 = $_POST["id_46"];
$price_46 = $_POST["price_46"];
$id_47 = $_POST["id_47"];
$price_47 = $_POST["price_47"];
$id_48 = $_POST["id_48"];
$price_48 = $_POST["price_48"];
$id_49 = $_POST["id_49"];
$price_49 = $_POST["price_49"];
$id_50 = $_POST["id_50"];
$price_50 = $_POST["price_50"];
$id_51 = $_POST["id_51"];
$price_51 = $_POST["price_51"];
$id_52 = $_POST["id_52"];
$price_52 = $_POST["price_52"];
$id_53 = $_POST["id_53"];
$price_53 = $_POST["price_53"];
$id_54 = $_POST["id_54"];
$price_54 = $_POST["price_54"];
$id_55 = $_POST["id_55"];
$price_55 = $_POST["price_55"];
$id_56 = $_POST["id_56"];
$price_56 = $_POST["price_56"];
$id_57 = $_POST["id_57"];
$price_57 = $_POST["price_57"];
$id_58 = $_POST["id_58"];
$price_58 = $_POST["price_58"];
$id_59 = $_POST["id_59"];
$price_59 = $_POST["price_59"];
$id_60 = $_POST["id_60"];
$price_60 = $_POST["price_60"];
$id_61 = $_POST["id_61"];
$price_61 = $_POST["price_61"];
$id_62 = $_POST["id_62"];
$price_62 = $_POST["price_62"];
$id_63 = $_POST["id_63"];
$price_63 = $_POST["price_63"];
$id_64 = $_POST["id_64"];
$price_64 = $_POST["price_64"];
$id_65 = $_POST["id_65"];
$price_65 = $_POST["price_65"];
$id_66 = $_POST["id_66"];
$price_66 = $_POST["price_66"];
$id_67 = $_POST["id_67"];
$price_67 = $_POST["price_67"];
$id_68 = $_POST["id_68"];
$price_68 = $_POST["price_68"];
$id_69 = $_POST["id_69"];
$price_69 = $_POST["price_69"];
$id_70 = $_POST["id_70"];
$price_70 = $_POST["price_70"];
$id_71 = $_POST["id_71"];
$price_71 = $_POST["price_71"];
$id_72 = $_POST["id_72"];
$price_72 = $_POST["price_72"];
$id_73 = $_POST["id_73"];
$price_73 = $_POST["price_73"];
$id_74 = $_POST["id_74"];
$price_74 = $_POST["price_74"];
$id_75 = $_POST["id_75"];
$price_75 = $_POST["price_75"];
$id_76 = $_POST["id_76"];
$price_76 = $_POST["price_76"];
$id_77 = $_POST["id_77"];
$price_77 = $_POST["price_77"];
$id_78 = $_POST["id_78"];
$price_78 = $_POST["price_78"];
$id_79 = $_POST["id_79"];
$price_79 = $_POST["price_79"];
$id_80 = $_POST["id_80"];
$price_80 = $_POST["price_80"];
$id_81 = $_POST["id_81"];
$price_81 = $_POST["price_81"];
$id_82 = $_POST["id_82"];
$price_82 = $_POST["price_82"];
$id_83 = $_POST["id_83"];
$price_83 = $_POST["price_83"];
$id_84 = $_POST["id_84"];
$price_84 = $_POST["price_84"];
$id_85 = $_POST["id_85"];
$price_85 = $_POST["price_85"];
$id_86 = $_POST["id_86"];
$price_86 = $_POST["price_86"];
$id_87 = $_POST["id_87"];
$price_87 = $_POST["price_87"];
$id_88 = $_POST["id_88"];
$price_88 = $_POST["price_88"];
$id_89 = $_POST["id_89"];
$price_89 = $_POST["price_89"];
$id_90 = $_POST["id_90"];
$price_90 = $_POST["price_90"];
$id_91 = $_POST["id_91"];
$price_91 = $_POST["price_91"];
$id_92 = $_POST["id_92"];
$price_92 = $_POST["price_92"];
$id_93 = $_POST["id_93"];
$price_93 = $_POST["price_93"];
$id_94 = $_POST["id_94"];
$price_94 = $_POST["price_94"];
$id_95 = $_POST["id_95"];
$price_95 = $_POST["price_95"];
$id_96 = $_POST["id_96"];
$price_96 = $_POST["price_96"];
$id_97 = $_POST["id_97"];
$price_97 = $_POST["price_97"];
$id_98 = $_POST["id_98"];
$price_98 = $_POST["price_98"];
$id_99 = $_POST["id_99"];
$price_99 = $_POST["price_99"];
$id_100 = $_POST["id_100"];
$price_100 = $_POST["price_100"];
$id_101 = $_POST["id_101"];
$price_101 = $_POST["price_101"];
$id_102 = $_POST["id_102"];
$price_102 = $_POST["price_102"];
$id_103 = $_POST["id_103"];
$price_103 = $_POST["price_103"];
$id_104 = $_POST["id_104"];
$price_104 = $_POST["price_104"];
$id_105 = $_POST["id_105"];
$price_105 = $_POST["price_105"];
$id_106 = $_POST["id_106"];
$price_106 = $_POST["price_106"];
$id_107 = $_POST["id_107"];
$price_107 = $_POST["price_107"];
$id_108 = $_POST["id_108"];
$price_108 = $_POST["price_108"];
$id_109 = $_POST["id_109"];
$price_109 = $_POST["price_109"];
$id_110 = $_POST["id_110"];
$price_110 = $_POST["price_110"];
$id_111 = $_POST["id_111"];
$price_111 = $_POST["price_111"];
$id_112 = $_POST["id_112"];
$price_112 = $_POST["price_112"];
$id_113 = $_POST["id_113"];
$price_113 = $_POST["price_113"];
$id_114 = $_POST["id_114"];
$price_114 = $_POST["price_114"];
$id_115 = $_POST["id_115"];
$price_115 = $_POST["price_115"];
$id_116 = $_POST["id_116"];
$price_116 = $_POST["price_116"];
$id_117 = $_POST["id_117"];
$price_117 = $_POST["price_117"];
$id_118 = $_POST["id_118"];
$price_118 = $_POST["price_118"];
$id_119 = $_POST["id_119"];
$price_119 = $_POST["price_119"];
$id_120 = $_POST["id_120"];
$price_120 = $_POST["price_120"];
$id_121 = $_POST["id_121"];
$price_121 = $_POST["price_121"];
$id_122 = $_POST["id_122"];
$price_122 = $_POST["price_122"];
$id_123 = $_POST["id_123"];
$price_123 = $_POST["price_123"];
$id_124 = $_POST["id_124"];
$price_124 = $_POST["price_124"];
$id_125 = $_POST["id_125"];
$price_125 = $_POST["price_125"];
$id_126 = $_POST["id_126"];
$price_126 = $_POST["price_126"];
$id_127 = $_POST["id_127"];
$price_127 = $_POST["price_127"];
$id_128 = $_POST["id_128"];
$price_128 = $_POST["price_128"];
$id_129 = $_POST["id_129"];
$price_129 = $_POST["price_129"];
$id_130 = $_POST["id_130"];
$price_130 = $_POST["price_130"];
$id_131 = $_POST["id_131"];
$price_131 = $_POST["price_131"];
$id_132 = $_POST["id_132"];
$price_132 = $_POST["price_132"];
$id_133 = $_POST["id_133"];
$price_133 = $_POST["price_133"];
$id_134 = $_POST["id_134"];
$price_134 = $_POST["price_134"];
$id_135 = $_POST["id_135"];
$price_135 = $_POST["price_135"];
$id_136 = $_POST["id_136"];
$price_136 = $_POST["price_136"];
$id_137 = $_POST["id_137"];
$price_137 = $_POST["price_137"];
$id_138 = $_POST["id_138"];
$price_138 = $_POST["price_138"];
$id_139 = $_POST["id_139"];
$price_139 = $_POST["price_139"];
$id_140 = $_POST["id_140"];
$price_140 = $_POST["price_140"];
$id_141 = $_POST["id_141"];
$price_141 = $_POST["price_141"];
$id_142 = $_POST["id_142"];
$price_142 = $_POST["price_142"];
$id_143 = $_POST["id_143"];
$price_143 = $_POST["price_143"];
$id_144 = $_POST["id_144"];
$price_144 = $_POST["price_144"];
$id_145 = $_POST["id_145"];
$price_145 = $_POST["price_145"];
$id_146 = $_POST["id_146"];
$price_146 = $_POST["price_146"];
$id_147 = $_POST["id_147"];
$price_147 = $_POST["price_147"];
$id_148 = $_POST["id_148"];
$price_148 = $_POST["price_148"];
$id_149 = $_POST["id_149"];
$price_149 = $_POST["price_149"];
$id_150 = $_POST["id_150"];
$price_150 = $_POST["price_150"];
$id_151 = $_POST["id_151"];
$price_151 = $_POST["price_151"];
$id_152 = $_POST["id_152"];
$price_152 = $_POST["price_152"];
$id_153 = $_POST["id_153"];
$price_153 = $_POST["price_153"];
$id_154 = $_POST["id_154"];
$price_154 = $_POST["price_154"];
$id_155 = $_POST["id_155"];
$price_155 = $_POST["price_155"];
$id_156 = $_POST["id_156"];
$price_156 = $_POST["price_156"];
$id_157 = $_POST["id_157"];
$price_157 = $_POST["price_157"];
$id_158 = $_POST["id_158"];
$price_158 = $_POST["price_158"];
$id_159 = $_POST["id_159"];
$price_159 = $_POST["price_159"];
$id_160 = $_POST["id_160"];
$price_160 = $_POST["price_160"];
$id_161 = $_POST["id_161"];
$price_161 = $_POST["price_161"];
$id_162 = $_POST["id_162"];
$price_162 = $_POST["price_162"];
$id_163 = $_POST["id_163"];
$price_163 = $_POST["price_163"];
$id_164 = $_POST["id_164"];
$price_164 = $_POST["price_164"];
$id_165 = $_POST["id_165"];
$price_165 = $_POST["price_165"];
$id_166 = $_POST["id_166"];
$price_166 = $_POST["price_166"];
$id_167 = $_POST["id_167"];
$price_167 = $_POST["price_167"];
$id_168 = $_POST["id_168"];
$price_168 = $_POST["price_168"];
$id_169 = $_POST["id_169"];
$price_169 = $_POST["price_169"];
$id_170 = $_POST["id_170"];
$price_170 = $_POST["price_170"];
$id_171 = $_POST["id_171"];
$price_171 = $_POST["price_171"];
$id_172 = $_POST["id_172"];
$price_172 = $_POST["price_172"];
$id_173 = $_POST["id_173"];
$price_173 = $_POST["price_173"];
$id_174 = $_POST["id_174"];
$price_174 = $_POST["price_174"];
$id_175 = $_POST["id_175"];
$price_175 = $_POST["price_175"];
$id_176 = $_POST["id_176"];
$price_176 = $_POST["price_176"];
$id_177 = $_POST["id_177"];
$price_177 = $_POST["price_177"];
$id_178 = $_POST["id_178"];
$price_178 = $_POST["price_178"];
$id_179 = $_POST["id_179"];
$price_179 = $_POST["price_179"];
$id_180 = $_POST["id_180"];
$price_180 = $_POST["price_180"];
$id_181 = $_POST["id_181"];
$price_181 = $_POST["price_181"];
$id_182 = $_POST["id_182"];
$price_182 = $_POST["price_182"];
$id_183 = $_POST["id_183"];
$price_183 = $_POST["price_183"];
$id_184 = $_POST["id_184"];
$price_184 = $_POST["price_184"];
$id_185 = $_POST["id_185"];
$price_185 = $_POST["price_185"];
$id_186 = $_POST["id_186"];
$price_186 = $_POST["price_186"];
$id_187 = $_POST["id_187"];
$price_187 = $_POST["price_187"];
$id_188 = $_POST["id_188"];
$price_188 = $_POST["price_188"];
$id_189 = $_POST["id_189"];
$price_189 = $_POST["price_189"];
$id_190 = $_POST["id_190"];
$price_190 = $_POST["price_190"];
$id_191 = $_POST["id_191"];
$price_191 = $_POST["price_191"];
$id_192 = $_POST["id_192"];
$price_192 = $_POST["price_192"];
$id_193 = $_POST["id_193"];
$price_193 = $_POST["price_193"];
$id_194 = $_POST["id_194"];
$price_194 = $_POST["price_194"];
$id_195 = $_POST["id_195"];
$price_195 = $_POST["price_195"];
$id_196 = $_POST["id_196"];
$price_196 = $_POST["price_196"];
$id_197 = $_POST["id_197"];
$price_197 = $_POST["price_197"];
$id_198 = $_POST["id_198"];
$price_198 = $_POST["price_198"];
$id_199 = $_POST["id_199"];
$price_199 = $_POST["price_199"];
$id_200 = $_POST["id_200"];
$price_200 = $_POST["price_200"];

$id_201 = $_POST["id_201"];
$price_201 = $_POST["price_201"];
$id_202 = $_POST["id_202"];
$price_202 = $_POST["price_202"];
$id_203 = $_POST["id_203"];
$price_203 = $_POST["price_203"];
$id_204 = $_POST["id_204"];
$price_204 = $_POST["price_204"];
$id_205 = $_POST["id_205"];
$price_205 = $_POST["price_205"];
$id_206 = $_POST["id_206"];
$price_206 = $_POST["price_206"];
$id_207 = $_POST["id_207"];
$price_207 = $_POST["price_207"];
$id_208 = $_POST["id_208"];
$price_208 = $_POST["price_208"];
$id_209 = $_POST["id_209"];
$price_209 = $_POST["price_209"];
$id_210 = $_POST["id_210"];
$price_210 = $_POST["price_210"];
$id_211 = $_POST["id_211"];
$price_211 = $_POST["price_211"];
$id_212 = $_POST["id_212"];
$price_212 = $_POST["price_212"];
$id_213 = $_POST["id_213"];
$price_213 = $_POST["price_213"];
$id_214 = $_POST["id_214"];
$price_214 = $_POST["price_214"];
$id_215 = $_POST["id_215"];
$price_215 = $_POST["price_215"];
$id_216 = $_POST["id_216"];
$price_216 = $_POST["price_216"];
$id_217 = $_POST["id_217"];
$price_217 = $_POST["price_217"];
$id_218 = $_POST["id_218"];
$price_218 = $_POST["price_218"];
$id_219 = $_POST["id_219"];
$price_219 = $_POST["price_219"];
$id_220 = $_POST["id_220"];
$price_220 = $_POST["price_220"];
$id_221 = $_POST["id_221"];
$price_221 = $_POST["price_221"];
$id_222 = $_POST["id_222"];
$price_222 = $_POST["price_222"];
$id_223 = $_POST["id_223"];
$price_223 = $_POST["price_223"];
$id_224 = $_POST["id_224"];
$price_224 = $_POST["price_224"];
$id_225 = $_POST["id_225"];
$price_225 = $_POST["price_225"];
$id_226 = $_POST["id_226"];
$price_226 = $_POST["price_226"];
$id_227 = $_POST["id_227"];
$price_227 = $_POST["price_227"];
$id_228 = $_POST["id_228"];
$price_228 = $_POST["price_228"];
$id_229 = $_POST["id_229"];
$price_229 = $_POST["price_229"];
$id_230 = $_POST["id_230"];
$price_230 = $_POST["price_230"];
$id_231 = $_POST["id_231"];
$price_231 = $_POST["price_231"];
$id_232 = $_POST["id_232"];
$price_232 = $_POST["price_232"];
$id_233 = $_POST["id_233"];
$price_233 = $_POST["price_233"];
$id_234 = $_POST["id_234"];
$price_234 = $_POST["price_234"];
$id_235 = $_POST["id_235"];
$price_235 = $_POST["price_235"];
$id_236 = $_POST["id_236"];
$price_236 = $_POST["price_236"];
$id_237 = $_POST["id_237"];
$price_237 = $_POST["price_237"];
$id_238 = $_POST["id_238"];
$price_238 = $_POST["price_238"];
$id_239 = $_POST["id_239"];
$price_239 = $_POST["price_239"];
$id_240 = $_POST["id_240"];
$price_240 = $_POST["price_240"];
$id_241 = $_POST["id_241"];
$price_241 = $_POST["price_241"];
$id_242 = $_POST["id_242"];
$price_242 = $_POST["price_42"];
$id_243 = $_POST["id_243"];
$price_243 = $_POST["price_243"];
$id_244 = $_POST["id_244"];
$price_244 = $_POST["price_244"];
$id_245 = $_POST["id_245"];
$price_245 = $_POST["price_245"];
$id_246 = $_POST["id_246"];
$price_246 = $_POST["price_246"];
$id_247 = $_POST["id_247"];
$price_247 = $_POST["price_247"];
$id_248 = $_POST["id_248"];
$price_248 = $_POST["price_248"];
$id_249 = $_POST["id_249"];
$price_249 = $_POST["price_249"];
$id_250 = $_POST["id_250"];
$price_250 = $_POST["price_250"];
$id_251 = $_POST["id_251"];
$price_251 = $_POST["price_251"];
$id_252 = $_POST["id_252"];
$price_252 = $_POST["price_252"];
$id_253 = $_POST["id_253"];
$price_253 = $_POST["price_253"];
$id_254 = $_POST["id_254"];
$price_254 = $_POST["price_254"];
$id_255 = $_POST["id_255"];
$price_255 = $_POST["price_255"];
$id_256 = $_POST["id_256"];
$price_256 = $_POST["price_256"];
$id_257 = $_POST["id_257"];
$price_257 = $_POST["price_257"];
$id_258 = $_POST["id_258"];
$price_258 = $_POST["price_258"];
$id_259 = $_POST["id_259"];
$price_259 = $_POST["price_259"];
$id_260 = $_POST["id_260"];
$price_260 = $_POST["price_260"];
$id_261 = $_POST["id_261"];
$price_261 = $_POST["price_261"];
$id_262 = $_POST["id_262"];
$price_262 = $_POST["price_262"];
$id_263 = $_POST["id_263"];
$price_263 = $_POST["price_263"];
$id_264 = $_POST["id_264"];
$price_264 = $_POST["price_264"];
$id_265 = $_POST["id_265"];
$price_265 = $_POST["price_265"];
$id_266 = $_POST["id_266"];
$price_266 = $_POST["price_266"];
$id_267 = $_POST["id_267"];
$price_267 = $_POST["price_267"];
$id_268 = $_POST["id_268"];
$price_268 = $_POST["price_268"];
$id_269 = $_POST["id_269"];
$price_269 = $_POST["price_269"];
$id_270 = $_POST["id_270"];
$price_270 = $_POST["price_270"];
$id_271 = $_POST["id_271"];
$price_271 = $_POST["price_271"];
$id_272 = $_POST["id_272"];
$price_272 = $_POST["price_272"];
$id_273 = $_POST["id_273"];
$price_273 = $_POST["price_273"];
$id_274 = $_POST["id_274"];
$price_274 = $_POST["price_274"];
$id_275 = $_POST["id_275"];
$price_275 = $_POST["price_275"];
$id_276 = $_POST["id_276"];
$price_276 = $_POST["price_276"];
$id_277 = $_POST["id_277"];
$price_277 = $_POST["price_277"];
$id_278 = $_POST["id_278"];
$price_278 = $_POST["price_278"];
$id_279 = $_POST["id_279"];
$price_279 = $_POST["price_279"];
$id_280 = $_POST["id_280"];
$price_280 = $_POST["price_280"];
$id_281 = $_POST["id_281"];
$price_281 = $_POST["price_281"];
$id_282 = $_POST["id_282"];
$price_282 = $_POST["price_282"];
$id_283 = $_POST["id_283"];
$price_283 = $_POST["price_283"];
$id_284 = $_POST["id_284"];
$price_284 = $_POST["price_284"];
$id_285 = $_POST["id_285"];
$price_285 = $_POST["price_285"];
$id_286 = $_POST["id_286"];
$price_286 = $_POST["price_286"];
$id_287 = $_POST["id_287"];
$price_287 = $_POST["price_287"];
$id_288 = $_POST["id_288"];
$price_288 = $_POST["price_288"];
$id_289 = $_POST["id_289"];
$price_289 = $_POST["price_289"];
$id_290 = $_POST["id_290"];
$price_290 = $_POST["price_290"];
$id_291 = $_POST["id_291"];
$price_291 = $_POST["price_291"];
$id_292 = $_POST["id_292"];
$price_292 = $_POST["price_292"];
$id_293 = $_POST["id_293"];
$price_293 = $_POST["price_293"];
$id_294 = $_POST["id_294"];
$price_294 = $_POST["price_294"];
$id_295 = $_POST["id_295"];
$price_295 = $_POST["price_295"];
$id_296 = $_POST["id_296"];
$price_296 = $_POST["price_296"];
$id_297 = $_POST["id_297"];
$price_297 = $_POST["price_297"];
$id_298 = $_POST["id_298"];
$price_298 = $_POST["price_298"];
$id_299 = $_POST["id_299"];
$price_299 = $_POST["price_299"];
$id_300 = $_POST["id_300"];
$price_300 = $_POST["price_300"];


$sql1 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_1."' WHERE id = '$id_1' ";
$query1 = mysql_query($sql1) or die("Can't Query1");

$sql2 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_2."' WHERE id = '$id_2' ";
$query2 = mysql_query($sql2) or die("Can't Query2");

$sql3 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_3."' WHERE id = '$id_3' ";
$query3 = mysql_query($sql3) or die("Can't Query3");

$sql4 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_4."' WHERE id = '$id_4' ";
$query4 = mysql_query($sql4) or die("Can't Query4");

$sql5 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_5."' WHERE id = '$id_5' ";
$query5 = mysql_query($sql5) or die("Can't Query5");

$sql6 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_6."' WHERE id = '$id_6' ";
$query6 = mysql_query($sql6) or die("Can't Query6");

$sql7 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_7."' WHERE id = '$id_7' ";
$query7 = mysql_query($sql7) or die("Can't Query7");

$sql8 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_8."' WHERE id = '$id_8' ";
$query8 = mysql_query($sql8) or die("Can't Query8");

$sql9 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_9."' WHERE id = '$id_9' ";
$query9 = mysql_query($sql9) or die("Can't Query9");

$sql10 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_10."' WHERE id = '$id_10' ";
$query10 = mysql_query($sql10) or die("Can't Query10");

$sql11 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_11."' WHERE id = '$id_11' ";
$query11 = mysql_query($sql11) or die("Can't Query11");

$sql12 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_12."' WHERE id = '$id_12' ";
$query12 = mysql_query($sql12) or die("Can't Query12");

$sql13 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_13."' WHERE id = '$id_13' ";
$query13 = mysql_query($sql13) or die("Can't Query13");

$sql14 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_14."' WHERE id = '$id_14' ";
$query14 = mysql_query($sql14) or die("Can't Query14");

$sql15 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_15."' WHERE id = '$id_15' ";
$query15 = mysql_query($sql15) or die("Can't Query15");

$sql16 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_16."' WHERE id = '$id_16' ";
$query16 = mysql_query($sql16) or die("Can't Query16");

$sql17 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_17."' WHERE id = '$id_17' ";
$query17 = mysql_query($sql17) or die("Can't Query17");

$sql18 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_18."' WHERE id = '$id_18' ";
$query18 = mysql_query($sql18) or die("Can't Query18");

$sql19 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_19."' WHERE id = '$id_19' ";
$query19 = mysql_query($sql19) or die("Can't Query19");

$sql20 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_20."' WHERE id = '$id_20' ";
$query20 = mysql_query($sql20) or die("Can't Query20");

$sql21 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_21."' WHERE id = '$id_21' ";
$query21 = mysql_query($sql21) or die("Can't Query21");

$sql22 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_22."' WHERE id = '$id_22' ";
$query22 = mysql_query($sql22) or die("Can't Query22");

$sql23 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_23."' WHERE id = '$id_23' ";
$query23 = mysql_query($sql23) or die("Can't Query23");

$sql24 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_24."' WHERE id = '$id_24' ";
$query24 = mysql_query($sql24) or die("Can't Query24");

$sql25 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_25."' WHERE id = '$id_25' ";
$query25 = mysql_query($sql25) or die("Can't Query25");

$sql26 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_26."' WHERE id = '$id_26' ";
$query26 = mysql_query($sql26) or die("Can't Query26");

$sql27 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_27."' WHERE id = '$id_27' ";
$query27 = mysql_query($sql27) or die("Can't Query27");

$sql28 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_28."' WHERE id = '$id_28' ";
$query28 = mysql_query($sql28) or die("Can't Query28");

$sql29 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_29."' WHERE id = '$id_29' ";
$query29 = mysql_query($sql29) or die("Can't Query29");

$sql30 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_30."' WHERE id = '$id_30' ";
$query30 = mysql_query($sql30) or die("Can't Query30");

$sql31 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_31."' WHERE id = '$id_31' ";
$query31 = mysql_query($sql31) or die("Can't Query31");

$sql32 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_32."' WHERE id = '$id_32' ";
$query32 = mysql_query($sql32) or die("Can't Query32");

$sql33 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_33."' WHERE id = '$id_33' ";
$query33 = mysql_query($sql33) or die("Can't Query33");

$sql34 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_34."' WHERE id = '$id_34' ";
$query34 = mysql_query($sql34) or die("Can't Query34");

$sql35 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_35."' WHERE id = '$id_35' ";
$query35 = mysql_query($sql35) or die("Can't Query35");

$sql36 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_36."' WHERE id = '$id_36' ";
$query36 = mysql_query($sql36) or die("Can't Query36");

$sql37 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_37."' WHERE id = '$id_37' ";
$query37 = mysql_query($sql37) or die("Can't Query37");

$sql38 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_38."' WHERE id = '$id_38' ";
$query38 = mysql_query($sql38) or die("Can't Query38");

$sql39 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_39."' WHERE id = '$id_39' ";
$query39 = mysql_query($sql39) or die("Can't Query39");

$sql40 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_40."' WHERE id = '$id_40' ";
$query40 = mysql_query($sql40) or die("Can't Query40");

$sql41 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_41."' WHERE id = '$id_41' ";
$query41 = mysql_query($sql41) or die("Can't Query41");

$sql42 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_42."' WHERE id = '$id_42' ";
$query42 = mysql_query($sql42) or die("Can't Query42");

$sql43 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_43."' WHERE id = '$id_43' ";
$query43 = mysql_query($sql43) or die("Can't Query43");

$sql44 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_44."' WHERE id = '$id_44' ";
$query44 = mysql_query($sql44) or die("Can't Query44");

$sql45 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_45."' WHERE id = '$id_45' ";
$query45 = mysql_query($sql45) or die("Can't Query45");

$sql46 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_46."' WHERE id = '$id_46' ";
$query46 = mysql_query($sql46) or die("Can't Query46");

$sql47 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_47."' WHERE id = '$id_47' ";
$query47 = mysql_query($sql47) or die("Can't Query47");

$sql48 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_48."' WHERE id = '$id_48' ";
$query48 = mysql_query($sql48) or die("Can't Query48");

$sql49 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_49."' WHERE id = '$id_49' ";
$query49 = mysql_query($sql49) or die("Can't Query49");

$sql50 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_50."' WHERE id = '$id_50' ";
$query50 = mysql_query($sql50) or die("Can't Query50");

$sql51 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_51."' WHERE id = '$id_51' ";
$query51 = mysql_query($sql51) or die("Can't Query51");

$sql52 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_52."' WHERE id = '$id_52' ";
$query52 = mysql_query($sql52) or die("Can't Query52");

$sql53 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_53."' WHERE id = '$id_53' ";
$query53 = mysql_query($sql53) or die("Can't Query53");

$sql54 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_54."' WHERE id = '$id_54' ";
$query54 = mysql_query($sql54) or die("Can't Query54");

$sql55 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_55."' WHERE id = '$id_55' ";
$query55 = mysql_query($sql55) or die("Can't Query55");

$sql56 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_56."' WHERE id = '$id_56' ";
$query56 = mysql_query($sql56) or die("Can't Query56");

$sql57 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_57."' WHERE id = '$id_57' ";
$query57 = mysql_query($sql57) or die("Can't Query57");

$sql58 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_58."' WHERE id = '$id_58' ";
$query58 = mysql_query($sql58) or die("Can't Query58");

$sql59 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_59."' WHERE id = '$id_59' ";
$query59 = mysql_query($sql59) or die("Can't Query59");

$sql60 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_60."' WHERE id = '$id_60' ";
$query60 = mysql_query($sql60) or die("Can't Query60");

$sql61 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_61."' WHERE id = '$id_61' ";
$query61 = mysql_query($sql61) or die("Can't Query61");

$sql62 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_62."' WHERE id = '$id_62' ";
$query62 = mysql_query($sql62) or die("Can't Query62");

$sql63 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_63."' WHERE id = '$id_63' ";
$query63 = mysql_query($sql63) or die("Can't Query63");

$sql64 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_64."' WHERE id = '$id_64' ";
$query64 = mysql_query($sql64) or die("Can't Query64");

$sql65 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_65."' WHERE id = '$id_65' ";
$query65 = mysql_query($sql65) or die("Can't Query65");

$sql66 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_66."' WHERE id = '$id_66' ";
$query66 = mysql_query($sql66) or die("Can't Query66");

$sql67 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_67."' WHERE id = '$id_67' ";
$query67 = mysql_query($sql67) or die("Can't Query67");

$sql68 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_68."' WHERE id = '$id_68' ";
$query68 = mysql_query($sql68) or die("Can't Query68");

$sql69 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_69."' WHERE id = '$id_69' ";
$query69 = mysql_query($sql69) or die("Can't Query69");

$sql70 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_70."' WHERE id = '$id_70' ";
$query70 = mysql_query($sql70) or die("Can't Query70");

$sql71 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_71."' WHERE id = '$id_71' ";
$query71 = mysql_query($sql71) or die("Can't Query71");

$sql72 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_72."' WHERE id = '$id_72' ";
$query72 = mysql_query($sql72) or die("Can't Query72");

$sql73 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_73."' WHERE id = '$id_73' ";
$query73 = mysql_query($sql73) or die("Can't Query73");

$sql74 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_74."' WHERE id = '$id_74' ";
$query74 = mysql_query($sql74) or die("Can't Query74");

$sql75 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_75."' WHERE id = '$id_75' ";
$query75 = mysql_query($sql75) or die("Can't Query75");

$sql76 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_76."' WHERE id = '$id_76' ";
$query76 = mysql_query($sql76) or die("Can't Query76");

$sql77 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_77."' WHERE id = '$id_77' ";
$query77 = mysql_query($sql77) or die("Can't Query77");

$sql78 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_78."' WHERE id = '$id_78' ";
$query78 = mysql_query($sql78) or die("Can't Query78");

$sql79 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_79."' WHERE id = '$id_79' ";
$query79 = mysql_query($sql79) or die("Can't Query79");

$sql80 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_80."' WHERE id = '$id_80' ";
$query80 = mysql_query($sql80) or die("Can't Query80");

$sql81 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_81."' WHERE id = '$id_81' ";
$query81 = mysql_query($sql81) or die("Can't Query81");

$sql82 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_82."' WHERE id = '$id_82' ";
$query82 = mysql_query($sql82) or die("Can't Query82");

$sql83 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_83."' WHERE id = '$id_83' ";
$query83 = mysql_query($sql83) or die("Can't Query83");

$sql84 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_84."' WHERE id = '$id_84' ";
$query84 = mysql_query($sql84) or die("Can't Query84");

$sql85 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_85."' WHERE id = '$id_85' ";
$query85 = mysql_query($sql85) or die("Can't Query85");

$sql86 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_86."' WHERE id = '$id_86' ";
$query86 = mysql_query($sql86) or die("Can't Query86");

$sql87 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_87."' WHERE id = '$id_87' ";
$query87 = mysql_query($sql87) or die("Can't Query87");

$sql88 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_88."' WHERE id = '$id_88' ";
$query88 = mysql_query($sql88) or die("Can't Query88");

$sql89 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_89."' WHERE id = '$id_89' ";
$query89 = mysql_query($sql89) or die("Can't Query89");

$sql90 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_90."' WHERE id = '$id_90' ";
$query90 = mysql_query($sql90) or die("Can't Query90");

$sql91 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_91."' WHERE id = '$id_91' ";
$query91 = mysql_query($sql91) or die("Can't Query91");

$sql92 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_92."' WHERE id = '$id_92' ";
$query92 = mysql_query($sql92) or die("Can't Query92");

$sql93 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_93."' WHERE id = '$id_93' ";
$query93 = mysql_query($sql93) or die("Can't Query93");

$sql94 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_94."' WHERE id = '$id_94' ";
$query94 = mysql_query($sql94) or die("Can't Query94");

$sql95 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_95."' WHERE id = '$id_95' ";
$query95 = mysql_query($sql95) or die("Can't Query95");

$sql96 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_96."' WHERE id = '$id_96' ";
$query96 = mysql_query($sql96) or die("Can't Query96");

$sql97 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_97."' WHERE id = '$id_97' ";
$query97 = mysql_query($sql97) or die("Can't Query97");

$sql98 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_98."' WHERE id = '$id_98' ";
$query98 = mysql_query($sql98) or die("Can't Query98");

$sql99 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_99."' WHERE id = '$id_99' ";
$query99 = mysql_query($sql99) or die("Can't Query99");

$sql100 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_100."' WHERE id = '$id_100' ";
$query100 = mysql_query($sql100) or die("Can't Query100");

$sql101 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_101."' WHERE id = '$id_101' ";
$query101 = mysql_query($sql101) or die("Can't Query101");

$sql102 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_102."' WHERE id = '$id_102' ";
$query102 = mysql_query($sql102) or die("Can't Query102");

$sql103 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_103."' WHERE id = '$id_103' ";
$query103 = mysql_query($sql103) or die("Can't Query103");

$sql104 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_104."' WHERE id = '$id_104' ";
$query104 = mysql_query($sql104) or die("Can't Query104");

$sql105 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_105."' WHERE id = '$id_105' ";
$query105 = mysql_query($sql105) or die("Can't Query105");

$sql106 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_106."' WHERE id = '$id_106' ";
$query106 = mysql_query($sql106) or die("Can't Query106");

$sql107 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_107."' WHERE id = '$id_107' ";
$query107 = mysql_query($sql107) or die("Can't Query107");

$sql108 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_108."' WHERE id = '$id_108' ";
$query108 = mysql_query($sql108) or die("Can't Query108");

$sql109 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_109."' WHERE id = '$id_109' ";
$query109 = mysql_query($sql109) or die("Can't Query109");

$sql110 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_110."' WHERE id = '$id_110' ";
$query110 = mysql_query($sql110) or die("Can't Query110");

$sql111 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_111."' WHERE id = '$id_111' ";
$query111 = mysql_query($sql111) or die("Can't Query111");

$sql112 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_112."' WHERE id = '$id_112' ";
$query112 = mysql_query($sql112) or die("Can't Query112");

$sql113 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_113."' WHERE id = '$id_113' ";
$query113 = mysql_query($sql113) or die("Can't Query113");

$sql114 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_114."' WHERE id = '$id_114' ";
$query114 = mysql_query($sql114) or die("Can't Query114");

$sql115 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_115."' WHERE id = '$id_115' ";
$query115 = mysql_query($sql115) or die("Can't Query115");

$sql116 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_116."' WHERE id = '$id_116' ";
$query116 = mysql_query($sql116) or die("Can't Query116");

$sql117 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_117."' WHERE id = '$id_117' ";
$query117 = mysql_query($sql117) or die("Can't Query117");

$sql118 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_118."' WHERE id = '$id_118' ";
$query118 = mysql_query($sql118) or die("Can't Query118");

$sql119 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_119."' WHERE id = '$id_119' ";
$query119 = mysql_query($sql119) or die("Can't Query119");

$sql120 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_120."' WHERE id = '$id_120' ";
$query120 = mysql_query($sql120) or die("Can't Query120");

$sql121 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_121."' WHERE id = '$id_121' ";
$query121 = mysql_query($sql121) or die("Can't Query121");

$sql122 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_122."' WHERE id = '$id_122' ";
$query122 = mysql_query($sql122) or die("Can't Query122");

$sql123 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_123."' WHERE id = '$id_123' ";
$query123 = mysql_query($sql123) or die("Can't Query123");

$sql124 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_124."' WHERE id = '$id_124' ";
$query124 = mysql_query($sql124) or die("Can't Query124");

$sql125 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_125."' WHERE id = '$id_125' ";
$query125 = mysql_query($sql125) or die("Can't Query125");

$sql126 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_126."' WHERE id = '$id_126' ";
$query126 = mysql_query($sql126) or die("Can't Query126");

$sql127 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_127."' WHERE id = '$id_127' ";
$query127 = mysql_query($sql127) or die("Can't Query127");

$sql128 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_128."' WHERE id = '$id_128' ";
$query128 = mysql_query($sql128) or die("Can't Query128");

$sql129 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_129."' WHERE id = '$id_129' ";
$query129 = mysql_query($sql129) or die("Can't Query129");

$sql130 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_130."' WHERE id = '$id_130' ";
$query130 = mysql_query($sql130) or die("Can't Query130");

$sql131 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_131."' WHERE id = '$id_131' ";
$query131 = mysql_query($sql131) or die("Can't Query131");

$sql132 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_132."' WHERE id = '$id_132' ";
$query132 = mysql_query($sql132) or die("Can't Query132");

$sql133 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_133."' WHERE id = '$id_133' ";
$query133 = mysql_query($sql133) or die("Can't Query133");

$sql134 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_134."' WHERE id = '$id_134' ";
$query134 = mysql_query($sql134) or die("Can't Query134");

$sql135 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_135."' WHERE id = '$id_135' ";
$query135 = mysql_query($sql135) or die("Can't Query135");

$sql136 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_136."' WHERE id = '$id_136' ";
$query136 = mysql_query($sql136) or die("Can't Query136");

$sql137 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_137."' WHERE id = '$id_137' ";
$query137 = mysql_query($sql137) or die("Can't Query137");

$sql138 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_138."' WHERE id = '$id_138' ";
$query138 = mysql_query($sql138) or die("Can't Query138");

$sql139 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_139."' WHERE id = '$id_139' ";
$query139 = mysql_query($sql139) or die("Can't Query139");

$sql140 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_140."' WHERE id = '$id_140' ";
$query140 = mysql_query($sql140) or die("Can't Query140");

$sql141 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_141."' WHERE id = '$id_141' ";
$query141 = mysql_query($sql141) or die("Can't Query141");

$sql142 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_142."' WHERE id = '$id_142' ";
$query142 = mysql_query($sql142) or die("Can't Query142");

$sql143 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_143."' WHERE id = '$id_143' ";
$query143 = mysql_query($sql143) or die("Can't Query143");

$sql144 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_144."' WHERE id = '$id_144' ";
$query144 = mysql_query($sql144) or die("Can't Query144");

$sql145 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_145."' WHERE id = '$id_145' ";
$query145 = mysql_query($sql145) or die("Can't Query145");

$sql146 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_146."' WHERE id = '$id_146' ";
$query146 = mysql_query($sql146) or die("Can't Query146");

$sql147 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_147."' WHERE id = '$id_147' ";
$query147 = mysql_query($sql147) or die("Can't Query147");

$sql148 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_148."' WHERE id = '$id_148' ";
$query148 = mysql_query($sql148) or die("Can't Query148");

$sql149 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_149."' WHERE id = '$id_149' ";
$query149 = mysql_query($sql149) or die("Can't Query149");

$sql150 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_150."' WHERE id = '$id_150' ";
$query150 = mysql_query($sql150) or die("Can't Query150");

$sql151 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_151."' WHERE id = '$id_151' ";
$query151 = mysql_query($sql151) or die("Can't Query151");

$sql152 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_152."' WHERE id = '$id_152' ";
$query152 = mysql_query($sql152) or die("Can't Query152");

$sql153 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_153."' WHERE id = '$id_153' ";
$query153 = mysql_query($sql153) or die("Can't Query153");

$sql154 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_154."' WHERE id = '$id_154' ";
$query154 = mysql_query($sql154) or die("Can't Query154");

$sql155 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_155."' WHERE id = '$id_155' ";
$query155 = mysql_query($sql155) or die("Can't Query155");

$sql156 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_156."' WHERE id = '$id_156' ";
$query156 = mysql_query($sql156) or die("Can't Query156");

$sql157 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_157."' WHERE id = '$id_157' ";
$query157 = mysql_query($sql157) or die("Can't Query157");

$sql158 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_158."' WHERE id = '$id_158' ";
$query158 = mysql_query($sql158) or die("Can't Query158");

$sql159 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_159."' WHERE id = '$id_159' ";
$query159 = mysql_query($sql159) or die("Can't Query159");

$sql160 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_160."' WHERE id = '$id_160' ";
$query160 = mysql_query($sql160) or die("Can't Query160");

$sql161 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_161."' WHERE id = '$id_161' ";
$query161 = mysql_query($sql161) or die("Can't Query161");

$sql162 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_162."' WHERE id = '$id_162' ";
$query162 = mysql_query($sql162) or die("Can't Query162");

$sql163 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_163."' WHERE id = '$id_163' ";
$query163 = mysql_query($sql163) or die("Can't Query163");

$sql164 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_164."' WHERE id = '$id_164' ";
$query164 = mysql_query($sql164) or die("Can't Query164");

$sql165 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_165."' WHERE id = '$id_165' ";
$query165 = mysql_query($sql165) or die("Can't Query165");

$sql166 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_166."' WHERE id = '$id_166' ";
$query166 = mysql_query($sql166) or die("Can't Query166");

$sql167 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_167."' WHERE id = '$id_167' ";
$query167 = mysql_query($sql167) or die("Can't Query167");

$sql168 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_168."' WHERE id = '$id_168' ";
$query168 = mysql_query($sql168) or die("Can't Query168");

$sql169 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_169."' WHERE id = '$id_169' ";
$query169 = mysql_query($sql169) or die("Can't Query169");

$sql170 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_170."' WHERE id = '$id_170' ";
$query170 = mysql_query($sql170) or die("Can't Query170");

$sql171 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_171."' WHERE id = '$id_171' ";
$query171 = mysql_query($sql171) or die("Can't Query171");

$sql172 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_172."' WHERE id = '$id_172' ";
$query172 = mysql_query($sql172) or die("Can't Query172");

$sql173 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_173."' WHERE id = '$id_173' ";
$query173 = mysql_query($sql173) or die("Can't Query173");

$sql174 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_174."' WHERE id = '$id_174' ";
$query174 = mysql_query($sql174) or die("Can't Query174");

$sql175 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_175."' WHERE id = '$id_175' ";
$query175 = mysql_query($sql175) or die("Can't Query175");

$sql176 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_176."' WHERE id = '$id_176' ";
$query176 = mysql_query($sql176) or die("Can't Query176");

$sql177 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_177."' WHERE id = '$id_177' ";
$query177 = mysql_query($sql177) or die("Can't Query177");

$sql178 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_178."' WHERE id = '$id_178' ";
$query178 = mysql_query($sql178) or die("Can't Query178");

$sql179 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_179."' WHERE id = '$id_179' ";
$query179 = mysql_query($sql179) or die("Can't Query179");

$sql180 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_180."' WHERE id = '$id_180' ";
$query180 = mysql_query($sql180) or die("Can't Query180");

$sql181 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_181."' WHERE id = '$id_181' ";
$query181 = mysql_query($sql181) or die("Can't Query181");

$sql182 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_182."' WHERE id = '$id_182' ";
$query182 = mysql_query($sql182) or die("Can't Query182");

$sql183 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_183."' WHERE id = '$id_183' ";
$query183 = mysql_query($sql183) or die("Can't Query183");

$sql184 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_184."' WHERE id = '$id_184' ";
$query184 = mysql_query($sql184) or die("Can't Query184");

$sql185 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_185."' WHERE id = '$id_185' ";
$query185 = mysql_query($sql185) or die("Can't Query185");

$sql186 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_186."' WHERE id = '$id_186' ";
$query186 = mysql_query($sql186) or die("Can't Query186");

$sql187 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_187."' WHERE id = '$id_187' ";
$query187 = mysql_query($sql187) or die("Can't Query187");

$sql188 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_188."' WHERE id = '$id_188' ";
$query188 = mysql_query($sql188) or die("Can't Query188");

$sql189 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_189."' WHERE id = '$id_189' ";
$query189 = mysql_query($sql189) or die("Can't Query189");

$sql190 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_190."' WHERE id = '$id_190' ";
$query190 = mysql_query($sql190) or die("Can't Query190");

$sql191 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_191."' WHERE id = '$id_191' ";
$query191 = mysql_query($sql191) or die("Can't Query191");

$sql192 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_192."' WHERE id = '$id_192' ";
$query192 = mysql_query($sql192) or die("Can't Query192");

$sql193 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_193."' WHERE id = '$id_193' ";
$query193 = mysql_query($sql193) or die("Can't Query193");

$sql194 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_194."' WHERE id = '$id_194' ";
$query194 = mysql_query($sql194) or die("Can't Query194");

$sql195 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_195."' WHERE id = '$id_195' ";
$query195 = mysql_query($sql195) or die("Can't Query195");

$sql196 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_196."' WHERE id = '$id_196' ";
$query196 = mysql_query($sql196) or die("Can't Query196");

$sql197 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_197."' WHERE id = '$id_197' ";
$query197 = mysql_query($sql197) or die("Can't Query197");

$sql198 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_198."' WHERE id = '$id_198' ";
$query198 = mysql_query($sql198) or die("Can't Query198");

$sql199 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_199."' WHERE id = '$id_199' ";
$query199 = mysql_query($sql199) or die("Can't Query199");

$sql200 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_200."' WHERE id = '$id_200' ";
$query200 = mysql_query($sql200) or die("Can't Query200");

$sql201 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_201."' WHERE id = '$id_201' ";
$query201 = mysql_query($sql201) or die("Can't Query1");

$sql202 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_202."' WHERE id = '$id_202' ";
$query202 = mysql_query($sql202) or die("Can't Query202");

$sql203 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_203."' WHERE id = '$id_203' ";
$query203 = mysql_query($sql203) or die("Can't Query203");

$sql204 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_204."' WHERE id = '$id_204' ";
$query204 = mysql_query($sql204) or die("Can't Query204");

$sql205 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_205."' WHERE id = '$id_205' ";
$query205 = mysql_query($sql205) or die("Can't Query205");

$sql206 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_206."' WHERE id = '$id_206' ";
$query206 = mysql_query($sql206) or die("Can't Query206");

$sql207 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_207."' WHERE id = '$id_207' ";
$query207 = mysql_query($sql207) or die("Can't Query207");

$sql208 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_208."' WHERE id = '$id_208' ";
$query208 = mysql_query($sql208) or die("Can't Query208");

$sql209 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_209."' WHERE id = '$id_209' ";
$query209 = mysql_query($sql209) or die("Can't Query209");

$sql210 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_210."' WHERE id = '$id_210' ";
$query210 = mysql_query($sql210) or die("Can't Query210");

$sql211 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_211."' WHERE id = '$id_211' ";
$query211 = mysql_query($sql211) or die("Can't Query211");

$sql212 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_212."' WHERE id = '$id_212' ";
$query212 = mysql_query($sql212) or die("Can't Query212");

$sql213 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_213."' WHERE id = '$id_213' ";
$query213 = mysql_query($sql213) or die("Can't Query213");

$sql214 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_214."' WHERE id = '$id_214' ";
$query214 = mysql_query($sql214) or die("Can't Query214");

$sql215 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_215."' WHERE id = '$id_215' ";
$query215 = mysql_query($sql215) or die("Can't Query215");

$sql216 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_216."' WHERE id = '$id_216' ";
$query216 = mysql_query($sql216) or die("Can't Query216");

$sql217 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_217."' WHERE id = '$id_217' ";
$query217 = mysql_query($sql217) or die("Can't Query217");

$sql218 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_218."' WHERE id = '$id_218' ";
$query218 = mysql_query($sql218) or die("Can't Query218");

$sql219 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_219."' WHERE id = '$id_219' ";
$query219 = mysql_query($sql219) or die("Can't Query219");

$sql220 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_220."' WHERE id = '$id_220' ";
$query220 = mysql_query($sql220) or die("Can't Query220");

$sql221 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_221."' WHERE id = '$id_221' ";
$query221 = mysql_query($sql221) or die("Can't Query221");

$sql222 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_222."' WHERE id = '$id_222' ";
$query222 = mysql_query($sql222) or die("Can't Query222");

$sql223 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_223."' WHERE id = '$id_223' ";
$query223 = mysql_query($sql223) or die("Can't Query223");

$sql224 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_224."' WHERE id = '$id_224' ";
$query224 = mysql_query($sql224) or die("Can't Query224");

$sql225 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_225."' WHERE id = '$id_225' ";
$query225 = mysql_query($sql225) or die("Can't Query225");

$sql226 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_226."' WHERE id = '$id_226' ";
$query226 = mysql_query($sql226) or die("Can't Query226");

$sql227 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_227."' WHERE id = '$id_227' ";
$query227 = mysql_query($sql227) or die("Can't Query227");

$sql228 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_228."' WHERE id = '$id_228' ";
$query228 = mysql_query($sql228) or die("Can't Query228");

$sql229 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_229."' WHERE id = '$id_229' ";
$query229 = mysql_query($sql229) or die("Can't Query229");

$sql230 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_230."' WHERE id = '$id_230' ";
$query230 = mysql_query($sql230) or die("Can't Query230");

$sql231 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_231."' WHERE id = '$id_231' ";
$query231 = mysql_query($sql231) or die("Can't Query231");

$sql232 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_232."' WHERE id = '$id_232' ";
$query232 = mysql_query($sql232) or die("Can't Query232");

$sql233 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_233."' WHERE id = '$id_233' ";
$query233 = mysql_query($sql233) or die("Can't Query233");

$sql234 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_234."' WHERE id = '$id_234' ";
$query234 = mysql_query($sql234) or die("Can't Query234");

$sql235 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_235."' WHERE id = '$id_235' ";
$query235 = mysql_query($sql235) or die("Can't Query235");

$sql236 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_236."' WHERE id = '$id_236' ";
$query236 = mysql_query($sql236) or die("Can't Query236");

$sql237 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_237."' WHERE id = '$id_237' ";
$query237 = mysql_query($sql237) or die("Can't Query237");

$sql238 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_238."' WHERE id = '$id_238' ";
$query238 = mysql_query($sql238) or die("Can't Query238");

$sql239 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_239."' WHERE id = '$id_239' ";
$query239 = mysql_query($sql239) or die("Can't Query239");

$sql240 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_240."' WHERE id = '$id_240' ";
$query240 = mysql_query($sql240) or die("Can't Query240");

$sql241 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_241."' WHERE id = '$id_241' ";
$query241 = mysql_query($sql241) or die("Can't Query241");

$sql242 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_242."' WHERE id = '$id_242' ";
$query242 = mysql_query($sql242) or die("Can't Query242");

$sql243 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_243."' WHERE id = '$id_243' ";
$query243 = mysql_query($sql243) or die("Can't Query243");

$sql244 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_244."' WHERE id = '$id_244' ";
$query244 = mysql_query($sql244) or die("Can't Query244");

$sql245 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_245."' WHERE id = '$id_245' ";
$query245 = mysql_query($sql245) or die("Can't Query245");

$sql246 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_246."' WHERE id = '$id_246' ";
$query246 = mysql_query($sql246) or die("Can't Query246");

$sql247 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_247."' WHERE id = '$id_247' ";
$query247 = mysql_query($sql247) or die("Can't Query247");

$sql248 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_248."' WHERE id = '$id_248' ";
$query248 = mysql_query($sql248) or die("Can't Query248");

$sql249 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_249."' WHERE id = '$id_249' ";
$query249 = mysql_query($sql249) or die("Can't Query249");

$sql250 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_250."' WHERE id = '$id_250' ";
$query250 = mysql_query($sql250) or die("Can't Query250");

$sql251 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_251."' WHERE id = '$id_251' ";
$query251 = mysql_query($sql251) or die("Can't Query251");

$sql252 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_252."' WHERE id = '$id_252' ";
$query252 = mysql_query($sql252) or die("Can't Query252");

$sql253 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_253."' WHERE id = '$id_253' ";
$query253 = mysql_query($sql253) or die("Can't Query253");

$sql254 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_254."' WHERE id = '$id_254' ";
$query254 = mysql_query($sql254) or die("Can't Query254");

$sql255 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_255."' WHERE id = '$id_255' ";
$query255 = mysql_query($sql255) or die("Can't Query255");

$sql256 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_256."' WHERE id = '$id_256' ";
$query256 = mysql_query($sql256) or die("Can't Query256");

$sql257 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_257."' WHERE id = '$id_257' ";
$query257 = mysql_query($sql257) or die("Can't Query257");

$sql258 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_258."' WHERE id = '$id_258' ";
$query258 = mysql_query($sql258) or die("Can't Query258");

$sql259 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_259."' WHERE id = '$id_259' ";
$query259 = mysql_query($sql259) or die("Can't Query259");

$sql260 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_260."' WHERE id = '$id_260' ";
$query260 = mysql_query($sql260) or die("Can't Query260");

$sql261 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_261."' WHERE id = '$id_261' ";
$query261 = mysql_query($sql261) or die("Can't Query261");

$sql262 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_262."' WHERE id = '$id_262' ";
$query262 = mysql_query($sql262) or die("Can't Query262");

$sql263 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_263."' WHERE id = '$id_263' ";
$query263 = mysql_query($sql263) or die("Can't Query263");

$sql264 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_264."' WHERE id = '$id_264' ";
$query264 = mysql_query($sql264) or die("Can't Query264");

$sql265 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_265."' WHERE id = '$id_265' ";
$query265 = mysql_query($sql265) or die("Can't Query265");

$sql266 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_266."' WHERE id = '$id_266' ";
$query266 = mysql_query($sql266) or die("Can't Query266");

$sql267 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_267."' WHERE id = '$id_267' ";
$query267 = mysql_query($sql267) or die("Can't Query267");

$sql268 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_268."' WHERE id = '$id_268' ";
$query268 = mysql_query($sql268) or die("Can't Query268");

$sql270 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_270."' WHERE id = '$id_270' ";
$query270 = mysql_query($sql270) or die("Can't Query270");

$sql271 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_271."' WHERE id = '$id_271' ";
$query271 = mysql_query($sql271) or die("Can't Query271");

$sql272 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_272."' WHERE id = '$id_272' ";
$query272 = mysql_query($sql272) or die("Can't Query272");

$sql273 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_273."' WHERE id = '$id_273' ";
$query273 = mysql_query($sql273) or die("Can't Query273");

$sql274 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_274."' WHERE id = '$id_274' ";
$query274 = mysql_query($sql274) or die("Can't Query274");

$sql275 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_275."' WHERE id = '$id_275' ";
$query275 = mysql_query($sql275) or die("Can't Query275");

$sql276 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_276."' WHERE id = '$id_276' ";
$query276 = mysql_query($sql276) or die("Can't Query276");

$sql277 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_277."' WHERE id = '$id_277' ";
$query277 = mysql_query($sql277) or die("Can't Query277");

$sql278 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_278."' WHERE id = '$id_278' ";
$query278 = mysql_query($sql278) or die("Can't Query278");

$sql279 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_279."' WHERE id = '$id_279' ";
$query279 = mysql_query($sql279) or die("Can't Query279");

$sql280 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_280."' WHERE id = '$id_280' ";
$query280 = mysql_query($sql280) or die("Can't Query280");

$sql281 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_281."' WHERE id = '$id_281' ";
$query281 = mysql_query($sql281) or die("Can't Query281");

$sql282 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_282."' WHERE id = '$id_282' ";
$query282 = mysql_query($sql282) or die("Can't Query282");

$sql283 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_283."' WHERE id = '$id_283' ";
$query283 = mysql_query($sql283) or die("Can't Query283");

$sql284 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_284."' WHERE id = '$id_284' ";
$query284 = mysql_query($sql284) or die("Can't Query284");

$sql285 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_285."' WHERE id = '$id_285' ";
$query285 = mysql_query($sql285) or die("Can't Query285");

$sql286 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_286."' WHERE id = '$id_286' ";
$query286 = mysql_query($sql286) or die("Can't Query286");

$sql287 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_287."' WHERE id = '$id_287' ";
$query287 = mysql_query($sql287) or die("Can't Query287");

$sql288 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_288."' WHERE id = '$id_288' ";
$query288 = mysql_query($sql288) or die("Can't Query288");

$sql289 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_289."' WHERE id = '$id_289' ";
$query289 = mysql_query($sql289) or die("Can't Query289");

$sql290 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_290."' WHERE id = '$id_290' ";
$query290 = mysql_query($sql290) or die("Can't Query290");

$sql291 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_291."' WHERE id = '$id_291' ";
$query291 = mysql_query($sql291) or die("Can't Query291");

$sql292 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_292."' WHERE id = '$id_292' ";
$query292 = mysql_query($sql292) or die("Can't Query292");

$sql293 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_293."' WHERE id = '$id_293' ";
$query293 = mysql_query($sql293) or die("Can't Query293");

$sql294 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_294."' WHERE id = '$id_294' ";
$query294 = mysql_query($sql294) or die("Can't Query294");

$sql295 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_295."' WHERE id = '$id_295' ";
$query295 = mysql_query($sql295) or die("Can't Query295");

$sql296 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_296."' WHERE id = '$id_296' ";
$query296 = mysql_query($sql296) or die("Can't Query296");

$sql297 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_297."' WHERE id = '$id_297' ";
$query297 = mysql_query($sql297) or die("Can't Query297");

$sql298 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_298."' WHERE id = '$id_298' ";
$query298 = mysql_query($sql298) or die("Can't Query298");

$sql299 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_299."' WHERE id = '$id_299' ";
$query299 = mysql_query($sql299) or die("Can't Query299");

$sql300 = " UPDATE admin_fabricbrand SET `fabricbrand_".$reseller_id."` = '".$price_300."' WHERE id = '$id_300' ";
$query300 = mysql_query($sql300) or die("Can't Query300");

if($query300) {
	
	echo " <script language='javascript'> window.location='../reseller/fabricbrand_price.php?id=".$reseller_id."'; </script> ";
	
}

mysql_close();
?>