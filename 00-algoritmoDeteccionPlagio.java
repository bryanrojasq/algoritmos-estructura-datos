// Algoritmo de análisis de ocurrencia de términos
// http://repositorio.sibdi.ucr.ac.cr:8080/jspui/handle/123456789/10037

iterator = blocks.ListIterator();

ArrayList<HashMap<String, Double>> mevs = new ArrayList();
HashMap<String, Double> mevs

while(iterator.hasNext()) {
	mev = new HashMap();
	text = (String) iterator.next();
	words = text.split("\\s");
	for(String word: words) {
		if(word.contains(".")) {
			word = word.substring(0, word.lastIndexOf("."));
		}
		if(word.length > 0) {
			if(mev.containsKey(word)) {
				mev.put(word, 1.0 + (double)mev.get(word));
			} else {
				mev.put(word, 1.0);
			}
		}
	}
	mevs.add(mev);
}

compareMev(List<HashMap<String, Double>> suspMev, List<HashMap<String, Double>> srcMev) {
	HashMap<String, Double> srcBlock;
	HashMap<String, Double> suspBlock;
	double max = 0;
	double cosine;

	Iterator srcIterator;
	Iterator suspIterator = suspMev.iterator();

	while(iterator.hasNext()) {
		suspBlock = (HashMap) suspIterator.next();
		srcIterator = srcMev.iterator();
		while(srcIterator.hasNext()){
			srcBlock = (HashMap) srcIterator.next();
			cosine = cosineMev(suspBlock, srcBlock);
			if(cosine > max) {
				max = cosine;
			}
		}
	}
	return max;
}

cosineMev(HashMap<String, Double> mev1, HashMap<String, Double> mev2) {
	Set<String> terms = new HashSet();
	terms.addAll(mev1.ketSet());
	terms.addAll(mev2.ketSet());

	Iterator iterator = terms.iterator();
	double numerator = 0.0, denominador1 = 0.0, denominador2 = 0.0, v1, v2;
	String term;
	while(iterator.hasNext()) {
		term = (String) iterator.next();
		v1 = (double) mev1.getOrDefault(term, 0.0);
		v2 = (double) mev2.getOrDefault(term, 0.0);
		numerator += v1*v2;
		denominador1 += Math.pow(v1, 2);
		denominador2 += Math.pow(v2, 2);
	}
	return numerator/(Math.sqrt(denominador1) * Math.sqrt(denominador2));
}

MessageDigest md = MessageDigest.getInstance("SHA-256");
iterator = blocks.ListIterator();
ArrayList<byte[]> blockMinutia;
boolean foundPeriod = false;
byte[] minutia;

while(iterator.hasNext()) {
	blockMinutia = new ArrayList();
	text = (String) iterator.next();
	words = text.split("\\s");
	text = "";

	for(int j=0; j<words.length; ++j) {
		if((j+minutiaSize) < words.length) {
			for(int k = 0; k < minutiaSize; ++k) {
				foundPeriod = (words[j+k].contains(".") && words[j+k].length() > 1 && k != minutiaSize -1);
				if(foundPeriod) {
					j = j+k;
					k = minutiaSize;
				} else {
					if(words[j+k].contains(".") && words[j+k].length() > 1) {
						text += " " words[j+k].substring(0, words[j+k].lastIndexOf("."));
					} else {
						text += " "+words[j+k];
					}
				}
			}
			if(!foundPeriod) {
				md.update(text.trim().getBytes("UTF-8"));
				minutia = md.digest();
				if(!findMinutia(blockMinutia, minutia)) {
					blockMinutia.add(minutia);
				}
			}
			text = "";
		}
	}
	fingerprint.add(blockMinutia);
}

compareFingerprints(ArrayList<ArrayList<byte[]>> suspFp, ArrayList<ArrayList<byte[]>> srcFp) {
	ArrayList<byte[]> block;
	Iterator blockIterator = suspFp.listIterator();
	ListIterator minutiaIterator;

	Integer [] maxSuspMatches = new Integer[suspFp.size()];
	Integer []srcBlockMatches = new Integer[srcFp.size()];

	int suspBlock = 0;
	int srcBlock;

	byte[] minutiae;

	while(blockIterator.hasNext()) {
		block = (ArrayList<byte[]>) blockIterator.next();
		minutiaIterator = block.listIterator();
		Arrays.fill(srcBlockMatches, 0);
		while(minutiaIterator.hasNext()) {
			srcBlock = 0;
			minutiae = (byte[]) minutiaIterator.next();
			for(boolean found: findMinutiae(minutiae, srcFp)) {
				if(found) {
					++srcBlockMatches[srcBlock];
				}
				++srcBlock;
			}
		}
	}
	return Collections.max(Arrays.asList(maxSuspMatches));
}

findMinutiae(byte[] suspMinutiae, ArrayList<ArrayList<byte[]>> srcFp) {
	boolean[] found = new boolean[srcFp.size()];
	byte[] scrMinutiae;
	int i = 0;

	ArrayList<byte[]> blockMinutia;
	Iterator iterator = srcFp.listIterator();
	ListIterator minutiaIterator;

	whilte(iterator.hasNext()) {
		blockMinutia = (ArrayList<byte[]>) iterator.next();
		minutiaIterator = blockMinutia.listIterator();
		while(minutiaIterator.hasNext() && !found[i]) {
			scrMinutiae = (byte[]) minutiaIterator.next();
			if(Arrays.equals(suspMinutiae, scrMinutiae)) {
				found[i] = true;
			}
		}
		++i;
	}

	return found;
}
