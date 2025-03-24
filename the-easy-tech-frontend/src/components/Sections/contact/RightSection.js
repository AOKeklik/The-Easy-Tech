import React from 'react'
import useInViewAnimation from "@/hooks/useInViewAnimation"

const RightSection = () => {
    const { ref, style } = useInViewAnimation({ direction: "right" })

    return <div 
        ref={ref} 
        style={style}
        className='w-full xl:w-3/5 xl:pl-20'
    >
        <form className='form-block flex flex-col justify-between gap-5'>
            <div className='heading'>
                <div className='heading5'>Request a message</div>
                <div className='body3 text-secondary mt-2'>We will back to your within 24 hours</div> 
            </div>
            <p className='text-green-800'>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat, aut.</p>
            <div className='grid sm:grid-cols-2 gap-5'>
                <div className='w-full'>
                    <input type="text" name="name" value="" placeholder='Name' className='w-full bg-slate-100 text-secondary caption1 px-4 py-3 rounded-lg'  /> 
                </div>
                <div className='w-full'>
                    <input type="text" name="subject" value="" placeholder='Subject' className='w-full bg-slate-100 text-secondary caption1 px-4 py-3 rounded-lg'  /> 
                </div>
                <div className='col-span-2'>
                    <select name="subject" className="w-full bg-slate-100 text-secondary py-3 px-4 rounded-lg">
                        <option value="">Select Subject</option>
                        <option value="">Courses</option>
                        <option value="">Summer School</option>
                        <option value="">Other</option>
                    </select>
                </div>
                <div className='col-span-2'>
                    <input type="email" name="email" placeholder='Email' value="" className='w-full bg-slate-100 text-secondary caption1 px-4 py-3 rounded-lg'  /> 
                </div>
                <div className='col-span-2 w-full'>
                    <textarea name="message" id="message" rows={4} value="" placeholder='Your Message' className='w-full bg-slate-100 text-secondary caption1 px-4 py-3 rounded-lg' ></textarea> 
                </div>
                <div className='button-block'>
                    <button type='submit' className='button-main hover:border-blue-800 bg-blue-500 text-white text-button rounded-full'>Send Message</button>
                </div> 
            </div> 
        </form>                 
    </div> 
};

export default RightSection