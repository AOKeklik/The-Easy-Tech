import React from 'react'
import useInViewAnimation from "@/hooks/useInViewAnimation"
import useContactForm from '@/hooks/useContactForm'
import Loader from '@/components/Loader/Loader'
import { URL_API } from '@/config/config';

const RightSection = () => {
    const {
        formData,
        errors,
        handleChange,
        validate,
        resetForm
    } = useContactForm()
    const { ref, style } = useInViewAnimation({ direction: "right" })

    const [loading, setLoading] = React.useState(false)
    const [resError, setResError] = React.useState(null)
    const [resSuccess, setResSuccess] = React.useState(null)

    const handleSubmit = async (e) => {
        e.preventDefault()
        
        setLoading(true)
        setResError(null)
        setResSuccess(null)
    
        if (!validate()) {
            setLoading(false)
            return
        }
        
        try {
            const response = await fetch(`${URL_API}/contact`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(formData)
            })
        
            if (!response.ok) {
                const errorData = await response.json()
                throw new Error(errorData.message)
            }
        
            const data = await response.json()

            setResSuccess(data.message)
            resetForm()
        } catch (err) {
            console.error(err)
            setResError(err.message)
        } finally {
            setLoading(false)
        }
    }

    return <div 
        ref={ref} 
        style={style}
        className='w-full xl:w-3/5 xl:pl-20'
    >
        {
            loading 
                ? <Loader fullHeight={false} />
                : <form onSubmit={handleSubmit} className='form-block flex flex-col justify-between gap-5'>
                    <div className='heading'>
                        <div className='heading5'>Request a message</div>
                        <div className='body3 text-secondary mt-2'>We will back to your within 24 hours</div> 
                    </div>
                    {resError && <p className='text-red-800'>{resError}</p>}
                    {resSuccess && <p className='text-green-800'>{resSuccess}</p>}
                    <div className='grid sm:grid-cols-2 gap-5'>
                        <div className='w-full'>
                            <input value={formData.name} onChange={handleChange} type="text" name="name" placeholder='Name' className='w-full bg-slate-100 text-secondary caption1 px-4 py-3 rounded-lg' /> 
                            {errors.name && <p className="text-red-500 text-sm">{errors.name}</p>}
                        </div>
                        <div className='w-full'>
                            <input value={formData.email} onChange={handleChange} type="email" name="email" placeholder='Email' className='w-full bg-slate-100 text-secondary caption1 px-4 py-3 rounded-lg' />
                            {errors.email && <p className="text-red-500 text-sm">{errors.email}</p>}
                        </div>
                        <div className='col-span-2'>
                            <select value={formData.subject} onChange={handleChange} name="subject" className="w-full bg-slate-100 text-secondary py-3 px-4 rounded-lg">
                                <option value="">Select Subject</option>
                                <option value="course">Courses</option>
                                <option value="school">Summer School</option>
                                <option value="other">Other</option>
                            </select>
                            {errors.subject && <p className="text-red-500 text-sm">{errors.subject}</p>}
                        </div>
                        <div className='col-span-2 w-full'>
                            <textarea value={formData.message} onChange={handleChange} name="message" id="message" rows={4} placeholder='Your Message' className='w-full bg-slate-100 text-secondary caption1 px-4 py-3 rounded-lg' ></textarea> 
                            {errors.message && <p className="text-red-500 text-sm">{errors.message}</p>}
                        </div>
                        <div className='button-block'>
                            <button type='submit' className='button-main hover:border-blue-800 bg-blue-500 text-white text-button rounded-full'>Send Message</button>
                        </div> 
                    </div> 
                </form>   
        }              
    </div> 
}
export default RightSection