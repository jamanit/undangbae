/**
 * @license Copyright (c) 2003-2024, CKSource Holding sp. z o.o. All rights reserved.
 * For licensing, see LICENSE.md or https://ckeditor.com/legal/ckeditor-oss-license
 */

( e => {
const { [ 'bn' ]: { dictionary, getPluralForm } } = {"bn":{"dictionary":{"Open file manager":"ফাইল ম্যানেজার খুলুন","Cannot determine a category for the uploaded file.":"আপলোড করা ফাইলের জন্য একটি বিভাগ নির্ধারণ করা যাচ্ছে না।","Cannot access default workspace.":"ডিফল্ট ওয়ার্কস্পেস অ্যাক্সেস করতে পারবেন না।","You have no image editing permissions.":"আপনার কোনও ইমেজ সম্পাদনার অনুমতি নেই।","Edit image":"ছবি এডিট করুন","Processing the edited image.":"এডিট করা ছবি প্রক্রিয়া করা হচ্ছে।","Server failed to process the image.":"সার্ভার ছবিটি প্রক্রিয়া করতে ব্যর্থ হয়েছে।","Failed to determine category of edited image.":"এডিট করা ছবির ক্যাটাগরি নির্ধারণ করতে ব্যর্থ হয়েছে।"},getPluralForm(n){return (n != 1);}}};
e[ 'bn' ] ||= { dictionary: {}, getPluralForm: null };
e[ 'bn' ].dictionary = Object.assign( e[ 'bn' ].dictionary, dictionary );
e[ 'bn' ].getPluralForm = getPluralForm;
} )( window.CKEDITOR_TRANSLATIONS ||= {} );